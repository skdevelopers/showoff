<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BankCodetypes;
use App\Models\BankdataModel;
use App\Models\BankModel;
use App\Models\CountryModel;
use App\Models\IndustryTypes;
use App\Models\VendorDetailsModel;
use App\Models\VendorModel;
use App\Models\UserLocations;
use App\Models\User;
use App\Models\Categories;
use App\Models\ProviderRegister;
use App\Models\SettingsModel;
use Illuminate\Http\Request;
use Redirect;
use Carbon\Carbon;
use Validator;

class HomeController extends Controller
{
    //
     public function verified()
    {
        $page_heading = "Home";
        return view('front_end.verified', compact('page_heading'));
    }
    public function email_verify($id)
    {
        $user = ProviderRegister::find(base64_decode(urldecode($id)));
        $user->email_verified = 1;
        $user->save();
        $page_heading = "Email verified successfully!";
        return view('front_end.verified', compact('page_heading'));
    }
    public function index()
    {
        return redirect('vendor');
        $page_heading = "Home";
        return view('front_end.index', compact('page_heading'));
    }
    public function checkAvailability(Request $request)
    {
        $post = $request->all();
        $field = $post['field'];
        $value = $post[$field];
        $exclude = $request->exclude;
        $count =VendorModel::where($field, $value);
        if($exclude){
            $count = $count->where($field,'!=',$exclude);
        }
        $count = $count->get()->count();
        if ($count) {
            dd('');
        } else {
            header("HTTP/1.1 200 Ok");
        }
    }
    
    public function auto_inactive()
    {
        $table = SettingsModel::first();
        
        date_default_timezone_set('UTC');
         
         $inactive_days = Carbon::now()->subDays($table->inactive_days);
         
          VendorModel::where('verified_date', '<=', $inactive_days)
            ->update(['active' => 0,'verified'=>1]);
        
        
    }


    public function register()
    {
        
        $page_heading = "Vendor Registration";
        $countries = CountryModel::orderBy('name', 'asc')->where(['deleted' => 0])->get();
        $categories = Categories::where(['deleted' => 0])->orderBy('sort_order', 'asc')->get();
        return view('front_end.register', compact('page_heading', 'countries','categories'));
    }

    public function save_vendor(Request $request)
    {
        $status = "0";
        $message = "";
        $o_data = [];
        $errors = [];
        $redirectUrl = '';

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if (!empty($request->password)) {
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
            $check_exist = VendorModel::where('email', $request->email)->where('id', '!=', $request->id)->get()->toArray();
            if (empty($check_exist)) {
                $check_exist_phone = VendorModel::where('phone', $request->phone)->where('id', '!=', $request->id)->get()->toArray();
                if (empty($check_exist_phone)) {
                    $datatb = $request;
                    $ins = [
                        'name' => $datatb->name,
                        'email' => $datatb->email,
                        'dial_code' => $datatb->dial_code,
                        'phone' => $datatb->phone,                     
                        'main_category_id'=>(int)$datatb->main_category_id,                       
                        'username' => $datatb->username,               
                        'location'=> $datatb->txt_location,   
                        'status'=>0,                
                        'about_me'=>$datatb->about_me,            
                        'country_id'=>$datatb->country_id,            
                        'city_id'=>$datatb->city_id,   
                        'state_id'=>$datatb->state_id,     
                        'password'=> bcrypt($datatb->password),
                        'otp'=>generate_otp(4)
                    ];
                    $location = explode(",",$request->location);
                    $ins['latitude']  = $location[0];
                    $ins['longitude']  = $location[1];
                    //$ins['phone_verified']  = 1;
                    //$ins['role']  = 4;
                    if ($file = $request->file("image")) {
                        $dir = config('global.upload_path') . "/" . config('global.user_image_upload_dir');
                        $file_name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                        $file->storeAs(config('global.user_image_upload_dir'), $file_name, config('global.upload_bucket'));
                        $ins['image'] = $file_name;
                        $ins['banners'] = $file_name;
                    }
                    if ($file = $request->file("trade_license")) {
                        $dir = config('global.upload_path') . "/" . config('global.user_image_upload_dir');
                        $file_name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                        $file->storeAs(config('global.user_image_upload_dir'), $file_name, config('global.upload_bucket'));
                        $ins['trade_license'] = $file_name;
                    }  
                    $checkExist = \App\Models\ProviderRegister::where('email',$datatb->email)->get()->first();
                    if($checkExist == null) {
                        $tempuserid = \App\Models\ProviderRegister::create($ins)->id;
                    } else {
                        \App\Models\ProviderRegister::where('id',$checkExist->id)->update($ins);
                        $tempuserid = $checkExist->id;
                    }
                    
                    if($tempuserid) {
                        $user = \App\Models\ProviderRegister::find($tempuserid);
                        $send_email_id = $request->email;
                        $email_status = send_email($send_email_id, 'List On: Email Verification Instructions', view('mail.registration_successful', compact('user')));
                        $new_reg = send_email('info@liston.com', 'New Registration', view('mail.new_registration_admin', compact('user')));
                        $status = "1";
                        $message = "Provider registration success";
                    }
                }
            }

        }
        echo json_encode(['status' => $status, 'message' => $message, 'errors' => $errors]);
    }

    public function reset_password($id)
    {
        $userdata = VendorModel::where('password_reset_code',$id)->first();
        if($userdata)
        {
            $timenew       = date('Y-m-d H:i:s');
            $cenvertedTime = date('Y-m-d H:i:s',strtotime('+10 minutes',strtotime($userdata->password_reset_time)));
            if($timenew <= $cenvertedTime)
            {
                $page_heading = "Reset Password";
                return view('front_end.reset_password', compact('page_heading','id'));
            }
            else
            {
            echo "Link expired";
            }
        }
        else
        {
            echo "Link expired";
        }

    }
    public function new_password(Request $request)
    {
       if ($request->isMethod('post')) {
            $status = "0";
            $message = "";
            $errors = [];
            $validator = Validator::make($request->all(),
                [
                    'password' => 'required',
                    'token' => 'required',
                ],
                [
                    'password.required' => 'Password required',
                    'token.required' => 'User token required',
                ]
            );
            if ($validator->fails()) {
                $status = "0";
                $message = "Validation error occured";
                $errors = $validator->messages();
            } else {
                $userdata = VendorModel::where('password_reset_code',$request->token)->first();
                $new_pswd = $request->password;
                $user_id = $userdata->id;
                    $up['password'] = bcrypt($new_pswd);
                    $up['updated_on'] =gmdate('Y-m-d H:i:s');
                    if(User::update_password($user_id,$new_pswd)){
                        $status = "1";
                        $message = "Password successfully changed";
                        $errors = '';
                    }else{
                        $status = "0";
                        $message = "Unable to change password. Please try again later";
                        $errors = '';
                    }

            }
            return response()->json(['success' => true, 'message' => $message]);
        }

    }
    public function update_location(Request $request)
    {
        $user = User::where(['firebase_user_key'=>$request->user_key])->get();
        if($user->count() > 0){
            $location = new UserLocations();
            $location->user_id = $user->first()->id;
            $location->lattitude = $request->latitude;
            $location->longitude = $request->longitude;
            $location->save();
        }
    }
    public function share_link(Request $request)
    {
        return Redirect::to(url('admin'));
        
        if(!empty($_SERVER['HTTP_USER_AGENT'])){
            $user_ag = $_SERVER['HTTP_USER_AGENT'];
            if(preg_match('/(Mobile|Android|Tablet|GoBrowser|[0-9]x[0-9]*|uZardWeb\/|Mini|Doris\/|Skyfire\/|iPhone|Fennec\/|Maemo|Iris\/|CLDC\-|Mobi\/)/uis',$user_ag)){
                return Redirect::to('https://play.google.com/');
            };
         };
         return Redirect::to(url('admin'));
        }
}
