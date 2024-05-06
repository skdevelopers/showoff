<?php

namespace App\Http\Controllers\Admin;
use App\Models\VendorModel;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\OrderProductsModel;
use DB;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $page_heading = "Dashboard";
        $users  = 0;
        $vendors = VendorModel::where(['role'=>'4','users.deleted'=>'0'])->get()->count();
        $customer = VendorModel::where(['role'=>'2','users.deleted'=>'0'])->get()->count(); 
        $coupons  = \App\Models\Coupons::count();
        $provider = \App\Models\ProviderRegister::orderBy('id', 'desc')->where('status',0)->count();
        
        
        $datamain = \App\Models\User::select('*', 'users.name as name', 'users.active as active', 'users.id as id', 'users.updated_at as updated_at')
        ->withCount('coupon')
        ->where(['role' => '4', 'users.deleted' => '0', 'users.phone_verified' => '1'])
        ->with(['country', 'city']);
        $datamain = $datamain->orderBy('users.id', 'desc')->get();
        $resultCountoutlet = $datamain->count();
        
        
        $datamaincustomers = \App\Models\User::select('*', 'users.name as name', 'users.active as active', 'users.id as id', 'users.updated_at as updated_at')
        ->where(['role' => '2', 'users.deleted' => '0','users.phone_verified' => '1'])
        ->with(['country','city'])
        ->withSum('couponUsage','earned_amount')
        ->withSum([
            'couponUsage as used_amount' => function ($query) { 
                $query->where('status', '1');
            } ], 'earned_amount');
            $datamaincustomers =$datamaincustomers ->orderBy('users.id', 'desc')->get();  
            $resultCountcustomers = $datamaincustomers->count();

            $datamainratingandreviews = \App\Models\Rating::orderBy('id','desc')->with(['outlet'=>function($q){
                $q->select('id','name','email','dial_code','phone');
            },'customer'=>function($q){
                $q->select('id','name','email','dial_code','phone');
            }]);
            $datamainratingandreviews =$datamainratingandreviews->get();  
            $resultratingandreviescount = $datamainratingandreviews->count();


            $datamaincoupons = \App\Models\Coupons::orderBy('coupon_id', 'DESC')->with('outlet')->withCount('earned')->withCount('redeemed')
            ->leftjoin('amount_type','amount_type.id','=','coupon.amount_type');
            $datamaincoupons = $datamaincoupons ->get();
            $resultcouponscount = $datamaincoupons->count();

            $datamaincouponsusage = \App\Models\CouponOrder::select('*','coupon_order.created_at as created_at')->leftjoin('coupon','coupon.coupon_id','=','coupon_order.coupon_id')->with(['coupon_details'=>function($q){
                $q->select('coupon_id','coupon_title');
            },'customer'=>function($q){
                $q->select('id','name','email','dial_code','phone');
            }])->orderBy('id','desc');
            $datamaincouponsusage = $datamaincouponsusage ->get();
            $resultcouponsusagecount = $datamaincouponsusage->count();
            
            return view('admin.dashboard', compact('page_heading','vendors','customer','coupons','provider','resultCountoutlet','resultCountcustomers','resultratingandreviescount','resultcouponscount','resultcouponsusagecount'));
        }
        function getLastNDays($days, $format = 'd/m'){
            $m = gmdate("m"); $de= gmdate("d"); $y= gmdate("Y");
            $dateArray = array();
            for($i=0; $i<=$days-1; $i++){
                $dateArray[] =  gmdate($format, mktime(0,0,0,$m,($de-$i),$y)); 
            }
            return array_reverse($dateArray);
        }
    }
    