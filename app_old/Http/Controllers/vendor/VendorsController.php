<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VendorModel;
use App\Models\VendorDetailsModel;
use App\Models\BankdataModel;
use App\Models\CountryModel;
use App\Models\IndustryTypes;
use App\Models\States;
use App\Models\Cities;
use App\Models\BankModel;
use App\Models\Coupons;
use App\Models\CouponOrder;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Validator;
use Hash;
use DB;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    public function index()
    {
        //
        $page_heading = "Vendors";
        $datamain = VendorModel::select('*','users.name as name','industry_types.name as industry','users.active as active','users.id as id')
            ->where(['role'=>'3','users.deleted'=>'0'])
            //->with('vendordata')
            ->leftjoin('vendor_details','vendor_details.user_id','=','users.id')
            ->leftjoin('industry_types','industry_types.id','=','vendor_details.industry_type')
            ->orderBy('users.id','desc')->get();

        return view('vendor.vendor.list', compact('page_heading', 'datamain'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_heading = "Vendors";
        $mode = "create";
        $id = "";
        $prefix = "";
        $name = "";
        $dial_code = "";
        $image = "";
        $active = "1";
        $states = [];
        $cities = [];
        $countries  = CountryModel::orderBy('name','asc')->get();
        $industry   = IndustryTypes::where(['deleted' => 0])->get();
        $banks      = BankModel::get();
        return view("vendor.vendor.create", compact('page_heading', 'industry', 'id', 'name', 'dial_code', 'active','prefix','countries','states','cities','banks'));
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
            'name' => 'required',
        ]);
        if(!empty($request->password))
        {
            $validator = Validator::make($request->all(), [
                'confirm_password' => 'required',
            ]);
        }
        if ($validator->fails()) {
            $status = "0";
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else {
            $input = $request->all();
            $check_exist = VendorModel::where('email' ,$request->email)->where('id', '!=', $request->id)->get()->toArray();
            if (empty($check_exist)) {
                $check_exist_phone = VendorModel::where('phone', $request->phone)->where('id', '!=', $request->id)->get()->toArray();
                if(empty($check_exist_phone))
                {

                    $ins = [
                        'country_id' => $request->country_id,
                        'name'       => $request->name,
                       // 'email'      => $request->email,
                        'dial_code'  => $request->dial_code,
                        'phone'      => $request->phone,
                        'about_me'      => $request->about_me,
                        'main_category_id'=>(int)$request->main_category_id,
                        'role'       => '4',//vendor
                        'first_name' => '',
                        'last_name'  => '',
                        'state_id'   => (int)$request->state_id,
                        'city_id'    => (int)$request->city_id,
                    ];



                    if($request->password){
                        $ins['password'] = bcrypt($request->password);
                    }

                    if ($file = $request->file("logo")) {
                        $dir = config('global.upload_path') . "/" . config('global.user_image_upload_dir');
                        $file_name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                        $file->storeAs(config('global.user_image_upload_dir'), $file_name, config('global.upload_bucket'));
                        $ins['user_image'] = $file_name;
                    }
                    if ($file = $request->file("trade_license")) {
                        $dir = config('global.upload_path') . "/" . config('global.user_image_upload_dir');
                        $file_name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                        $file->storeAs(config('global.user_image_upload_dir'), $file_name, config('global.upload_bucket'));
                        $ins['trade_license'] = $file_name;
                    }


                    if ($request->id != "") {
                        $ins['updated_at'] = gmdate('Y-m-d H:i:s');
                        $user = VendorModel::find($request->id);
                        $user->update($ins);

                        $vendordata = VendorDetailsModel::where('user_id',$request->id)->first();
                        //$bank       = BankdataModel::where('user_id',$request->id)->first();
                        if(empty($vendordata->id))
                        {
                            $vendordatils = new VendorDetailsModel();
                            $vendordatils->user_id = $request->id;
                        }
                        else
                        {
                            $vendordatils = VendorDetailsModel::find($vendordata->id);
                        }

                        // if(empty($bank->id))
                        // {
                        //     $bankdata = new BankdataModel();
                        //     $bankdata->user_id = $request->id;
                        // }
                        // else
                        // {
                        //     $bankdata = BankdataModel::find($bank->id);
                        // }



                        $status = "1";
                        $message = "Profile updated succesfully";
                    } else {
                        $ins['created_at'] = gmdate('Y-m-d H:i:s');
                        $userid = VendorModel::create($ins)->id;


                        $vendordatils = new VendorDetailsModel();
                        $vendordatils->user_id = $userid;

                        $bankdata = new BankdataModel();
                        $bankdata->user_id = $userid;

                        $status = "1";
                        $message = "Profile added successfully";
                    }

                    $vendordatils->industry_type = (int)$request->industrytype;
                    $vendordatils->homedelivery  =  (int)$request->has_own_delivery;
                    $vendordatils->branches      = (int)$request->no_of_branches;
                    $vendordatils->company_name       = $request->company_legal_name;
                    $vendordatils->company_brand      = $request->company_brand_name;
                    $vendordatils->reg_date           = $request->business_registration_date;
                    $vendordatils->trade_license           = $request->trade_licene_number;
                    $vendordatils->trade_license_expiry    = $request->trade_licene_expiry;
                    $vendordatils->vat_reg_number      = $request->vat_registration_number;
                    $vendordatils->vat_reg_expiry      = $request->vat_expiry_date;

                    $vendordatils->address1      = $request->address1;
                    $vendordatils->address2      = $request->address2;
                    $vendordatils->street        = $request->street;
                    $vendordatils->state         = (int)$request->state_id;
                    $vendordatils->city          = (int)$request->city_id;
                    $vendordatils->zip           = $request->zip;


                    //logo
                    if($request->file("logo")){
                        $response = image_upload($request,'company','logo');
                        if($response['status']){
                            $vendordatils->logo = $response['link'];
                        }
                    }
                    //logo end
                    $vendordatils->save();

                    // $bankdata->bank_name       = (int)$request->bank_id;
                    // $bankdata->country         = $request->bankcountry;
                    // $bankdata->company_account = $request->company_account;
                    // $bankdata->account_no      = $request->bank_account_number;
                    // $bankdata->branch_code     = $request->bank_branch_code;
                    // $bankdata->branch_name     = $request->branch_name;

                    // $bankdata->save();




                }
                else
                {
                    $status = "0";
                    $message = "Phone number should be unique";
                    $errors['phone'] = "Already exist";
                }

            } else {
                $status = "0";
                $message = "Email should be unique";
                $errors['email'] = $request->email . " already added";
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
        $page_heading = "Edit Vendor";
        $datamain = VendorModel::find($id);
        $datamain->vendordatils = VendorDetailsModel::where('user_id',$id)->first();
        $datamain->bankdetails = BankdataModel::where('user_id',$id)->first();

        $countries = CountryModel::orderBy('name','asc')->get();
        $industry = IndustryTypes::where(['deleted' => 0])->get();
        $banks      = BankModel::get();
        $user_image = asset($datamain->user_image);
        $states = States::where(['deleted' => 0, 'active' => 1, 'country_id' => $datamain->country_id])->orderBy('name', 'asc')->get();

        $cities = Cities::where(['deleted' => 0, 'active' => 1, 'state_id' => $datamain->state_id])->orderBy('name', 'asc')->get();
        if ($datamain) {
            return view("vendor.vendor.create", compact('page_heading', 'datamain','id','countries','states','cities','user_image','industry','banks'));
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
    public function change_status(Request $request)
    {
        $status = "0";
        $message = "";
        if(VendorModel::where('id', $request->id)->update(['active' => $request->status])) {
            $status = "1";
            $msg = "Successfully activated";
            if (!$request->status) {
                $msg = "Successfully deactivated";
            }
            $message = $msg;
        } else {
            $message = "Something went wrong";
        }
        echo json_encode(['status' => $status, 'message' => $message]);
    }
    public function destroy($id)
    {
        $status = "0";
        $message = "";
        $o_data = [];
        $datatb = VendorModel::find($id);
        if ($datatb) {
            $datatb->deleted = 1;
            $datatb->active = 0;
            $datatb->save();
            $status = "1";
            $message = "Vendor removed successfully";
        } else {
            $message = "Sorry!.. You cant do this?";
        }

        echo json_encode(['status' => $status, 'message' => $message, 'o_data' => $o_data]);
    }

    public function MyProfile(){

        $id  = auth()->user()->id;

        $page_heading = "My Profile"; 
        $datamain = VendorModel::find($id);  
        
        $categories = \App\Models\Categories::where(['deleted' => 0])->orderBy('sort_order', 'asc')->get();
        $countries = CountryModel::orderBy('name','asc')->where(['deleted' => 0])->get();
       
        $user_image = asset($datamain->user_image);
        $states = States::where(['deleted' => 0, 'active' => 1, 'country_id' => $datamain->country_id])->orderBy('name', 'asc')->get();

        $cities = Cities::where(['deleted' => 0, 'active' => 1, 'state_id' => $datamain->state_id])->orderBy('name', 'asc')->get();
        if ($datamain) {
            return view("vendor.vendor.profile", compact('page_heading', 'datamain','id','countries','states',
            'cities','user_image','categories'));
        } else {
            abort(404);
        }
    }
    public function CreateOrder(){

        $id  = auth()->user()->id;

        $page_heading = "Apply Voucher";
        $datamain = VendorModel::find($id);  
        
        $categories = \App\Models\Categories::where(['deleted' => 0])->orderBy('sort_order', 'asc')->get();
        $countries = CountryModel::orderBy('name','asc')->get();
       
        $user_image = asset($datamain->user_image);
        $states = States::where(['deleted' => 0, 'active' => 1, 'country_id' => $datamain->country_id])->orderBy('name', 'asc')->get();

        $cities = Cities::where(['deleted' => 0, 'active' => 1, 'state_id' => $datamain->state_id])->orderBy('name', 'asc')->get();
        if ($datamain) {
            return view("vendor.vendor.create_order", compact('page_heading', 'datamain','id','countries','states',
            'cities','user_image','categories'));
        } else {
            abort(404);
        }
    }
    public function CreateOrderStore(Request $request)
    {
        $status = "0";
        $message = "";
        $o_data = [];
        $errors = [];
        $redirectUrl = '';

        $validator = Validator::make($request->all(), [
            'qr_code' => 'required',
        ]);
        
        if ($validator->fails()) {
            $status = "0";
            $message = "Validation error occured";
            $errors = $validator->messages();
        } else
         {
            $user_id = auth()->user()->id;

            $lastSixDigits = substr($request->qr_code, -6);
            $datamain = str_split($lastSixDigits, 3);
            if(!empty($datamain[0]) && !empty($datamain[1]))
            {
                $customer_id = (int) $datamain[0];
                $coupon_id   = (int) $datamain[1];
            }
            else
            {
                $customer_id = 0;
                $coupon_id= 0;
            }
            
           
            //DB::statement("TRUNCATE coupon_order RESTART IDENTITY CASCADE;");
            $datamain = Coupons::where('coupon_id',$coupon_id)->where('outlet_id',$user_id)->first();
            if($datamain)
            {
                if($datamain->start_date <= date('Y-m-d H:i:s') && $datamain->coupon_end_date >= date('Y-m-d H:i:s'))
                {
                    $check = CouponOrder::where('customer_id',$customer_id)->where('coupon_id',$coupon_id)->get()->count();
                    $used_total = CouponOrder::where('coupon_id',$coupon_id)->get()->count();
                    if($check < $datamain->coupon_usage_peruser && $used_total < $datamain->coupon_usage_percoupon)
                    {  
                        $datains = new CouponOrder;
                        $datains->customer_id = $customer_id;
                        $datains->outlet_id = $user_id;
                        $datains->coupon_id = $coupon_id;
                        $datains->coupon_code = $datamain->coupon_code;
                        $datains->order_date = gmdate('Y-m-d H:i:s');
                        $datains->save();
    
                        $datainsorder = CouponOrder::find($datains->id);
                        $datainsorder->order_no = config('global.sale_order_prefix').date(date('Ymd', strtotime($datainsorder->order_date))).$datainsorder->id;
                        $datainsorder->save();
    
                        $status = (string) 1;
                        $message = "Coupon applied successfully!"; 
                        $o_data['order_id'] = (string) $datainsorder->id;
                        $o_data['order_no'] = $datainsorder->order_no;

                        $users = User::where('id',$customer_id)->where('send_notification','!=',2)->first();
                        $title = $datainsorder->order_no;//'Order Cancelled';
                        $description = $message;
                        $notification_id = time();
                        $ntype = 'order_created';
                        if (!empty($users->firebase_user_key)) {
                        $notification_data["Notifications/" . $users->firebase_user_key . "/" . $notification_id] = [
                            "title" => $title,
                            "description" => $description,
                            "notificationType" => $ntype,
                            "createdAt" => gmdate("d-m-Y H:i:s", $notification_id),
                            "orderId" => (string) $coupon_id,
                            "url" => "",
                            "imageURL" => '',
                            "read" => "0",
                            "seen" => "0",
                        ];
                        $this->database->getReference()->update($notification_data);
                    }

                    if (!empty($users->user_device_token)) {
                        send_single_notification(
                            $users->user_device_token,
                            [
                                "title" => $title,
                                "body" => $description,
                                "icon" => 'myicon',
                                "sound" => 'default',
                                "click_action" => "EcomNotification"
                            ],
                            [
                                "type" => $ntype,
                                "notificationID" => $notification_id,
                                "orderId" => (string) $coupon_id,
                                "imageURL" => "",
                            ]
                        );
                    }
                    }
                    else
                    {
                        $alert = array(
                            'qr_code'           => 'Already used'
                             );
                             $status = "0";
                             $message = "Validation error occured";
                             $errors = $alert;
                    }
                    
                }
                else
                {
                        $alert = array(
                        'qr_code'           => 'Coupon expired'
                         );
                         $status = "0";
                         $message = "Validation error occured";
                         $errors = $alert;
                }
                
            }
            else
            {
                    $alert = array(
                    'qr_code'           => 'Invalid Coupon'
                     );
                     $status = "0";
                     $message = "Validation error occured";
                     $errors = $alert;
            }
            
        }
        echo json_encode(['status' => $status, 'message' => $message, 'errors' => $errors]);
    }
}
