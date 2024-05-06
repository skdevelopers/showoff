<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Auth;
use Excel;
use App\Exports\ReportCustomerExportOutlet;
use App\Exports\ReportCouponExport;
use App\Exports\ReportExportRating;
use App\Exports\ReportCouponUsageStatistics;

class ReportController extends Controller
{
    public function customers(Request $request)
    {
        $page_heading = "Customer Report";
        $from_date ="";
        $to_date ="";   
        $datamain = \App\Models\User::select('*', 'users.name as name', 'users.active as active', 'users.id as id', 'users.updated_at as updated_at')
            ->join('coupon_order','coupon_order.customer_id','users.id')
            ->join('coupon','coupon.coupon_id','coupon_order.coupon_id')
            ->where('coupon.outlet_id',Auth::user()->id)
            ->where(['role' => '2', 'users.deleted' => '0','users.phone_verified' => '1'])
            ->with(['country','city']);
            // ->withSum('couponUsage','earned_amount')
            // ->withSum([
            //                 'couponUsage as used_amount' => function ($query) { 
            //                     $query->where('status', '1');
            //                 } ], 'earned_amount');

        if(isset($request->from_date))  {
            $request->from_date = date('Y-m-d',strtotime($request->from_date));
            $from_date = $request->from_date ;
            $datamain =$datamain ->whereDate('users.created_at','>=',$request->from_date);
        }
        if(isset($request->to_date))  {
            $request->to_date = date('Y-m-d',strtotime($request->to_date));
            $to_date = $request->to_date ;
            $datamain =$datamain ->whereDate('users.created_at','<=',$request->to_date);
        }
        $datamain =$datamain ->orderBy('users.id', 'desc')->get();   
        return view('vendor.reports.customer_list', compact('page_heading', 'datamain','from_date','to_date'));
    }
   
    public function ratings(Request $request)
    {
        $page_heading = "Rating & Reviews";
        $from_date ="";
        $to_date ="";
        $datamain = \App\Models\Rating::where('vendor_id',Auth::user()->id)->orderBy('id','desc')->with(['customer'=>function($q){
            $q->select('id','name','email','dial_code','phone');
        }]);

        if(isset($request->from_date))  {
            $request->from_date = date('Y-m-d',strtotime($request->from_date));
            $from_date = $request->from_date ;
            $datamain =$datamain ->whereDate('created_at','>=',$request->from_date);
        }
        if(isset($request->to_date))  {
            $request->to_date = date('Y-m-d',strtotime($request->to_date));
            $to_date = $request->to_date ;
            $datamain =$datamain ->whereDate('created_at','<=',$request->to_date);
        }
        $datamain =$datamain->get();   
        return view('vendor.reports.reviews', compact('page_heading', 'datamain','from_date','to_date'));
    }
    public function coupons(Request $request)
    {
        $page_heading = "Voucher Report";
        $datamain = \App\Models\Coupons::orderBy('coupon_id', 'DESC')->where('outlet_id',Auth::user()->id)->with('outlet')->withCount('earned')->withCount('redeemed')
        ->leftjoin('amount_type','amount_type.id','=','coupon.amount_type');
        if(isset($request->search_key)) {
            $datamain = $datamain ->whereRaw("(coupon_code ilike '%".$request->search_key."%')");
        }
        if(isset($request->status)) {
            $datamain = $datamain ->where('coupon_status',$request->status);
        }
        
        if(isset($request->date)) {
            $datamain = $datamain ->where('start_date','<=',date('Y-m-d',strtotime($request->date)))->where('coupon_end_date','>=',date('Y-m-d',strtotime($request->date)));
        }
        $datamain = $datamain ->get();  
        $outlets = \App\Models\VendorModel::where(['role' => '4', 'users.deleted' => '0','users.phone_verified' => '1'])->get();
        return view('vendor.reports.coupons', compact('page_heading', 'datamain','outlets'));
    }

    public function exportCustomers(Request $request)
    {
        return Excel::download(new ReportCustomerExportOutlet($request), 'customer_report.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    
    public function exportCoupon(Request $request)
    {
        $request->outlet_id = Auth::user()->id;
        return Excel::download(new ReportCouponExport($request), 'voucher.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
    public function exportRating(Request $request)
    {
        $request->outlet_id = Auth::user()->id;
        return Excel::download(new ReportExportRating($request), 'rating.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
    public function exportCouponStatistics(Request $request)
    {
        $request->outlet_id = Auth::user()->id;
        return Excel::download(new ReportCouponUsageStatistics($request), 'voucher_usage.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
     
}
