<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use DB;
use App\Models\OrderProductsModel;
use App\Models\ProductModel;
use Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $page_heading = "Vendor Dashboard";
        $store_id = Auth::user()->id;

        $coupons = \App\Models\Coupons::where('outlet_id',Auth::user()->id)->count();
        $usage  = \App\Models\CouponOrder::join('coupon','coupon.coupon_id','coupon_order.coupon_id')->where('coupon.outlet_id',Auth::user()->id)->count();
        $customers = \App\Models\User::join('coupon_order','coupon_order.customer_id','users.id')
            ->join('coupon','coupon.coupon_id','coupon_order.coupon_id')
            ->where('coupon.outlet_id',Auth::user()->id)->count();
        return view('vendor.dashboard', compact('page_heading','coupons','usage','customers'));
    }
}
