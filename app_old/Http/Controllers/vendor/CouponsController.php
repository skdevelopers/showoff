<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Coupons;
use App\Models\AmountType;
use App\Models\CouponOrder;
use App\Models\Categories;
use App\Models\CouponCategory;
use App\Models\CouponImages;
use Illuminate\Http\Request;
use Validator,Auth;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $page_heading = "Voucher"; ;
        $datamain = Coupons::orderBy('coupon_id', 'DESC')->with('outlet')->where('outlet_id',Auth::user()->id)
        ->leftjoin('amount_type','amount_type.id','=','coupon.amount_type');
        if(isset($request->search_key)) {
            $datamain = $datamain ->where('coupon_code',$request->search_key);
        }
        if(isset($request->status)) {
            $datamain = $datamain ->where('coupon_status',$request->status);
        }        
        if(isset($request->date)) {
            $datamain = $datamain ->where('start_date','<=',date('Y-m-d',strtotime($request->date)))->where('coupon_end_date','>=',date('Y-m-d',strtotime($request->date)));
        }
        $datamain = $datamain ->get();
        
        $outlets = \App\Models\VendorModel::where(['role' => '4', 'users.deleted' => '0','users.phone_verified' => '1'])->get();
        return view('vendor.coupons.list', compact('page_heading', 'datamain','outlets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $category_ids = [];
        $page_heading = "Create Voucher";
        $mode = "create";
        $id = "";
        $prefix = "";
        $name = "";
        $dial_code = "";
        $image = "";
        $active = "1";
        $amounttype = AmountType::get();
        $user = \App\Models\User::find(Auth::user()->id);
        $categories = Categories::select('id','name')->orderBy('sort_order','asc')->where(['deleted'=>0,'active'=>1,'id'=>$user->main_category_id])->get();
        $videos = \App\Models\Videos::where('vendor_id',Auth::user()->id)->where('videos.deleted', 0)->get();

        $outlets = \App\Models\VendorModel::where(['role' => '4', 'users.deleted' => '0','users.phone_verified' => '1'])->get(['id','name','main_category_id']);
        return view("vendor.coupons.create", compact('page_heading', 'mode', 'id', 'name', 'dial_code', 'active','prefix','amounttype','categories','category_ids','outlets','videos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = "0";
        $message = "";
        $o_data = [];
        $errors = [];
        $redirectUrl = '';

        $validator = Validator::make($request->all(), [
            //'coupone_code'    => 'required',
            'coupone_amount'  => '',
            'amount_type'     => 'required',
            'expirydate'      => 'required',
            'startdate'       => 'required',
            'title'           => 'required',
            'description'     => 'required',
        ]);
        if ($validator->fails()) {
            $status = "0";
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {
            $input = $request->all();
            $check_exist = Coupons::where(['coupon_code' => $request->coupone_code])->where('coupon_id', '!=', $request->id)->get()->toArray();
            if (empty($check_exist)) {
                $ins = [
                    'coupon_code'      => $request->coupone_code??'',
                    'coupon_amount'    =>  $request->coupone_amount,
                    'amount_type'      =>  $request->amount_type,
                    'coupon_title'     => $request->title,
                    'coupon_description' => $request->description,
                    'coupon_status'    => 0,
                    'start_date'       => $request->startdate,
                    'coupon_end_date'  => $request->expirydate,
                    'applied_to'       => (int)$request->applies_to,
                    'minimum_amount'   => $request->minimum_amount,
                    'coupon_usage_percoupon'   => $request->coupon_usage_percoupon,
                    'coupon_usage_peruser'     => $request->coupon_usage_peruser,
                    'outlet_id' =>Auth::user()->id,
                    'offer_label'=>$request->offer_label,
                    'coupon_price'=>$request->coupon_price,
                    'saved_price'=>$request->saved_price
                ];
                
                $dir = config('global.upload_path') . "/" . config('global.coupon_upload_dir');
                $categories = $request->category_ids; 
                if ($file = $request->file("image")) {
                    
                    $file_name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                    $file->storeAs(config('global.coupon_upload_dir'), $file_name, config('global.upload_bucket'));
                    $ins['image'] = $file_name;
                }
                if ($file = $request->file("policy")) {
                    
                    $file_name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                    $file->storeAs(config('global.coupon_upload_dir'), $file_name, config('global.upload_bucket'));
                    $ins['policy'] = $file_name;
                }
                $other_document = [];
                if ($request->id != "") {
                    $obj = Coupons::where('coupon_id',$request->id)->first();
                    $other_document = explode(",",$obj->other_documents);
                }
                
                if($files=$request->file('other_document')){
                   foreach($files as $kery =>  $file){
                        
                        $file_name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                        $file->storeAs(config('global.coupon_upload_dir'), $file_name, config('global.upload_bucket'));
                        $other_document[] = $file_name;
                   }
                 } 
                $other_document = array_filter($other_document);
                $ins['other_documents'] = implode(",",array_values($other_document));
                $CouponUnlockVideos = $request->videos;

                if ($request->id != "") {
                    $ins['updated_at'] = gmdate('Y-m-d H:i:s');
                    Coupons::where('coupon_id',$request->id)->update($ins);
                    CouponCategory::insertcategory($request->id,$categories);
                    $status = "1";
                    $message = "Coupon updated succesfully";
                    $coupon_id = $request->id;
                } else {
                    $ins['created_at'] = gmdate('Y-m-d H:i:s');
                    Coupons::insert($ins);
                    $inid = Coupons::orderBy('coupon_id', 'desc')->get()->first();
                    CouponCategory::insertcategory($inid->coupon_id,$categories);
                    $coupon_id = $inid->coupon_id;
                    $status = "1";
                    $message = "Coupon added successfully";
                    $user = Auth::user();
                    $new_reg = send_email('info@dealsdrive.app', 'New voucher posted - Waiting for Video Upload', view('mail.new_voucher_added', compact('user','inid')));
                }
                if($status == "1") {
                    \App\Models\CouponUnlockVideos::where('coupon_id',$coupon_id)->delete();
                    if(!empty($CouponUnlockVideos)) { 
                        foreach ($CouponUnlockVideos as $key => $value) {
                            $obj = new \App\Models\CouponUnlockVideos();
                            $obj->coupon_id  = $coupon_id;
                            $obj->video_id  = $value;
                            $obj->sort_order  = $key+1;
                            $obj->save();
                        }
                    }
                    
                        $banners = $request->file("banners");
            
            $banner_images = [];
            if ($banners) {
                foreach ($banners as $ikey => $img) {
                    
                    if ($file = $img) {
                        $file_name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                        $file->storeAs(config('global.coupon_upload_dir'), $file_name, config('global.upload_bucket'));
                  
                        // $dir = config('global.upload_path') . "/" . config('global.coupon_upload_dir');
                        // $file_name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                        // $file->move(public_path('storage/game/'), $file_name);
                        // $file->storeAs(config('global.game_image_upload_dir'), $file_name, config('global.upload_bucket'));
                        
                        $gameimages = new CouponImages;
                        $gameimages->coupon_id = $coupon_id;
                        $gameimages->coupon_banner = $file_name;
                        $gameimages->save();
                        
                        $ins['image'] = $file_name;
                        Coupons::where('coupon_id',$coupon_id)->update($ins);
                        
                    }
                    
                    
                }
              
            }
                }
            } else {
                $status = "0";
                $message = "Coupon code should be unique";
                $errors['coupone_code'] = $request->coupone_code . " already added";
            }

        }
        echo json_encode(['status' => $status, 'message' => $message, 'errors' => $errors]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $category_ids = [];
        $amounttype = AmountType::get();
        $datamain = Coupons::where('coupon_id',$id)->with('videos')->first(); 
        $datamain->images = CouponImages::where('coupon_id',$datamain->coupon_id)->get();
        if ($datamain) {
            $page_heading = "Voucher Edit";
            $mode = "edit";
            $prefix = "";
        $name = "";
        $dial_code = "";
        $image = "";
        $active = "1";

        $categories = Categories::select('id','name')->orderBy('sort_order','asc')->where(['deleted'=>0,'active'=>1,])->get();

        $product_categories = CouponCategory::where('coupon_id',$id)->get()->toArray();
        $category_ids       = array_column($product_categories,'category_id');
        $outlets = \App\Models\VendorModel::where(['role' => '4', 'users.deleted' => '0','users.phone_verified' => '1'])->get(['id','name','main_category_id']);
        $videos = \App\Models\Videos::where('vendor_id',$datamain->outlet_id)->where('videos.deleted', 0)->get();

        $id = "";
            return view("vendor.coupons.create", compact('page_heading', 'datamain','id','amounttype','categories','category_ids','outlets','videos'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = "0";
        $message = "";
        $o_data = [];
        $datamain = Coupons::where('coupon_id',$id)->first();
        if ($datamain) {
            $check = CouponOrder::where('coupon_id',$id)->get()->count();
            if($check > 0)
            {
                $message = "Unable to delete already used!";
            }
            else
            {
                Coupons::where('coupon_id',$id)->delete();
                $status = "1";
                $message = "Coupon removed successfully";
            }
            
        } else {
            $message = "Sorry!.. You cant do this?";
        }

        echo json_encode(['status' => $status, 'message' => $message, 'o_data' => $o_data]);
    }

    public function deleteDocument(Request $request)
    {
        $status = "0";
        $message = "";
        $o_data = [];
        $datamain = Coupons::where('coupon_id',$request->id)->first();
        $other_document = explode(",",$datamain->other_documents);
        unset($other_document[array_search($request->flname,$other_document)]);
        $ins['other_documents'] = implode(",",$other_document);
        Coupons::where('coupon_id',$request->id)->update($ins);
        $status = "1";
        $message = "Success";
        echo json_encode(['status' => $status, 'message' => $message, 'o_data' => $o_data]);
    }
    public function couponUsage(Request $request)
    {
        $page_heading = "Voucher Usage";
        $datamain = \App\Models\CouponOrder::select('*','coupon_order.created_at as created_at')->join('coupon','coupon.coupon_id','coupon_order.coupon_id')->with(['customer'=>function($q){
            $q->select('id','name','email','dial_code','phone');
        }])->orderBy('id','desc')->where('coupon_order.outlet_id',Auth::user()->id);
        if(isset($request->search_key)) {
            $datamain = $datamain->where('coupon_title', 'LIKE', '%'.$request->search_key.'%');
        }
        $datamain = $datamain ->get();
        return view('vendor.coupons.usage', compact('page_heading','datamain'));
    }
}
