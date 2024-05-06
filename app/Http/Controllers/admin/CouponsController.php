<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupons;
use App\Models\CouponOrder;
use App\Models\AmountType;
use App\Models\Categories;
use App\Models\VendorModel;
use App\Models\CouponCategory;
use App\Models\CouponImages;
use Illuminate\Http\Request;
use Validator;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!check_permission('coupon','View')) {
            abort(404);
        }
        $page_heading = "Vouchers";
        $datamain = Coupons::orderBy('coupon_id', 'DESC')->with('outlet')
        ->leftjoin('amount_type','amount_type.id','=','coupon.amount_type');
        if(isset($request->search_key)) {
            $datamain = $datamain ->whereRaw("(coupon_code ilike '%".$request->search_key."%')");
        }
        if(isset($request->status)) {
            $datamain = $datamain ->where('coupon_status',$request->status);
        }
        if(isset($request->outlet_id)) {
            $datamain = $datamain ->where('outlet_id',$request->outlet_id);
        }
        if(isset($request->date)) {
            $datamain = $datamain ->where('start_date','<=',date('Y-m-d',strtotime($request->date)))->where('coupon_end_date','>=',date('Y-m-d',strtotime($request->date)));
        }
        $datamain = $datamain ->get();
        $outlets = \App\Models\VendorModel::where(['role' => '4', 'users.deleted' => '0','users.phone_verified' => '1'])->get();
        return view('admin.coupons.list', compact('page_heading', 'datamain','outlets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!check_permission('coupon','Create')) {
            abort(404);
        }
        $category_ids = [];
        $page_heading = "Vouchers";
        $mode = "create";
        $id = "";
        $prefix = "";
        $name = "";
        $dial_code = "";
        $image = "";
        $active = "1";
        $amounttype = AmountType::get();

        $categories = Categories::select('id','name')->orderBy('sort_order','asc')->where(['deleted'=>0,'active'=>1,])->get();
        $videos = \App\Models\Videos::where('videos.deleted', 0)->get();

        $outlets = \App\Models\VendorModel::where(['role' => '4', 'users.deleted' => '0','users.phone_verified' => '1'])->get(['id','name','main_category_id']);
        return view("admin.coupons.create", compact('page_heading', 'mode', 'id', 'name', 'dial_code', 'active','prefix','amounttype','categories','category_ids','outlets','videos'));
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

        $fildes = [
            // 'coupone_code'    => 'required',
             'coupone_amount'  => '',
             'amount_type'     => 'required',
             'startdate'       => 'required',
             'expirydate'      => 'required|date_format:Y-m-d|after_or_equal:startdate',
            
             'title'           => 'required',
             'description'     => 'required',
        ];

        $validator = Validator::make($request->all(), $fildes,[
            'expirydate.after_or_equal'=>'Expiry date should be after start date',
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
                    'coupon_status'    => $request->active,
                    'start_date'       => $request->startdate,
                    'coupon_end_date'  => $request->expirydate,
                    'applied_to'       => (int)$request->applies_to,
                    'minimum_amount'   => $request->minimum_amount,
                    'coupon_usage_percoupon'   => $request->coupon_usage_percoupon,
                    'coupon_usage_peruser'     => $request->coupon_usage_peruser,
                    'outlet_id' =>$request->outlet_id,
                    'offer_label'=>$request->offer_label,
                    'coupon_price'=>$request->coupon_price,
                    'saved_price'=>$request->saved_price
                ];
                
                $dir = config('global.upload_path') . "/" . config('global.coupon_upload_dir');
                $user_data = VendorModel::find($request->outlet_id);
                $categories = [$user_data->main_category_id]; 
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
                    $message = "Voucher added successfully";
                }
                if($status == "1") {
                    \App\Models\CouponUnlockVideos::where('coupon_id',$coupon_id)->delete();
                    if(!empty($CouponUnlockVideos) && isset($request->videos)) { 
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
                $message = "Voucher code should be unique";
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
        if (!check_permission('coupon','Edit')) {
            abort(404);
        }
        $category_ids = [];
        $amounttype = AmountType::get();
        $datamain = Coupons::where('coupon_id',$id)->with('videos')->first(); 
        $datamain->images = CouponImages::where('coupon_id',$datamain->coupon_id)->get();
        
        
        
        if ($datamain) {
            $page_heading = "Coupon";
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
            return view("admin.coupons.create", compact('page_heading', 'datamain','id','amounttype','categories','category_ids','outlets','videos'));
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
                $message = "Voucher removed successfully";
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
        $page_heading = "Vouchers Usage Statistics";
        $datamain = \App\Models\CouponOrder::select('*','coupon_order.created_at as created_at')->leftjoin('coupon','coupon.coupon_id','=','coupon_order.coupon_id')->with(['coupon_details'=>function($q){
            $q->select('coupon_id','coupon_title');
        },'customer'=>function($q){
            $q->select('id','name','email','dial_code','phone');
        }])->orderBy('id','desc');
        if(isset($request->search_key)) {
            $datamain = $datamain->where('coupon_title', 'LIKE', '%'.$request->search_key.'%');
        }
        if(isset($request->user_id)) {
            $datamain = $datamain ->where('customer_id',$request->user_id);
        }
        $datamain = $datamain ->get();
        $customerList =  \App\Models\User::select('users.name as name','users.id as id')->where(['role' => '2', 'users.deleted' => '0','users.phone_verified' => '1'])->get();
        ;
        return view('admin.coupons.usage', compact('page_heading','datamain','customerList'));
    }
    public function delete_image($id)
   {
    $status = "0";
    $message = "";
    $o_data = [];
    $img =  CouponImages::find($id);
    if ($img) {
        $img->delete();
        $status = "1";
        $message = "Image removed successfully";
    } else {
        $message = "Sorry!.. You cant do this?";
    }
    
    echo json_encode(['status' => $status, 'message' => $message, 'o_data' => $o_data]);
    
}
}
