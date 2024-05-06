<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Models\VendorModel;
use App\Models\ProviderRegister;

class ProviderController extends Controller
{
	public function index(Request $request)
	{

        $page_heading = "Provider Registrations";
        $datamain = ProviderRegister::orderBy('id', 'desc')->where('status',0)->get();

        return view('admin.providers.list', compact('page_heading', 'datamain'));
	}
	public function destroy($id)
    {
        $status = "0";
        $message = "";
        $o_data = [];
        $datatb = ProviderRegister::find($id);
        if ($datatb) {
            $datatb->delete();
           
            $status = "1";
            $message = "Provider registration removed successfully";
        } else {
            $message = "Sorry!.. You cant do this?";
        }

        echo json_encode(['status' => $status, 'message' => $message, 'o_data' => $o_data]);
    }
    public function change_status(Request $request)
    {
        $status = "0";
        $message = "";
        $datatb = ProviderRegister::find($request->id);    
        if($datatb) { 
        	if($request->status == 1) {        		
        		$ins = [
                        'name' => $datatb->name,
                        'email' => $datatb->email,
                        'dial_code' => $datatb->dial_code,
                        'phone' => $datatb->phone,
                        'role' => '4', //outlet
                        'main_category_id'=>(int)$datatb->main_category_id,
                        'first_name' => $datatb->name,
                        'last_name' => '',
                        'user_name' => $datatb->username,                        
                        'phone_verified'=> '1',
                        'location' =>$datatb->location,
                        'latitude'=>$datatb->latitude,
                        'longitude'=>$datatb->longitude,
                        'trade_license'=>$datatb->trade_license,
                        'password'=>$datatb->password,
                        'about_me'=>$datatb->about_me,
                        'business_type'=>$datatb->business_type,                        
                        'about_me'=>$datatb->about_me,
                        'verified'=>1,
                        'user_image'=>$datatb->image,
                        'country_id'=>$datatb->country_id,  
                        'state_id'=>$datatb->state_id,  
                        'city_id'=>$datatb->city_id,  
                       
                    ];
                $ins['created_at'] = gmdate('Y-m-d H:i:s');
                $ins['active'] = 1;
                $userid = \App\Models\VendorModel::create($ins)->id;
                if($userid) {
                	$datatb->status = 1;;
                	$datatb->save();
                	$message = "Outlet verified successfully";
                	$status = "1";
                	$user = \App\Models\VendorModel::find($userid);
                	$email_status = send_email($user->email, 'Your Account Has Been Activated on Deals Drive', view('mail.account_verified', compact('user')));
                } 
                       
        	}
        } else {
            $message = "Something went wrong";
        }
        echo json_encode(['status' => $status, 'message' => $message]);
    }
    public function view(Request $request)
    {
        $page_heading = "View Registrations";
        $datamain = ProviderRegister::with(['category','country','city'])->find($request->id);  
        if($datamain) { 

        }
        return view('admin.providers.view', compact('page_heading', 'datamain'));
    }


}