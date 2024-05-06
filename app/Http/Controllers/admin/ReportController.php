<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Excel;
use App\Exports\ReportCustomerExport;
use App\Exports\ReportOutletExport;
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
            ->where(['role' => '2', 'users.deleted' => '0','users.phone_verified' => '1'])
            ->with(['country','city'])
            ->withSum('couponUsage','earned_amount')
            ->withSum([
                            'couponUsage as used_amount' => function ($query) { 
                                $query->where('status', '1');
                            } ], 'earned_amount');

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
        $datamain =$datamain ->orderBy('users.id', 'desc')->get();   
        return view('admin.reports.customer_list', compact('page_heading', 'datamain','from_date','to_date'));
    }
    public function outlet(Request $request)
    {
        $page_heading = "Outlet Report";
        $from_date ="";
        $to_date ="";
        $datamain = \App\Models\User::select('*', 'users.name as name', 'users.active as active', 'users.id as id', 'users.updated_at as updated_at')->withCount('coupon')
            ->where(['role' => '4', 'users.deleted' => '0','users.phone_verified' => '1'])
            ->with(['country','city']);
           

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
        $datamain =$datamain ->orderBy('users.id', 'desc')->get();   
        return view('admin.reports.outlet_list', compact('page_heading', 'datamain','from_date','to_date'));
    }
    public function ratings(Request $request)
    {
        $page_heading = "Rating & Reviews";
        $from_date ="";
        $to_date ="";
        $datamain = \App\Models\Rating::orderBy('id','desc')->with(['outlet'=>function($q){
            $q->select('id','name','email','dial_code','phone');
        },'customer'=>function($q){
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
        return view('admin.reports.reviews', compact('page_heading', 'datamain','from_date','to_date'));
    }
    public function coupons(Request $request)
    {
        $page_heading = "Vouchers Report";
        $datamain = \App\Models\Coupons::orderBy('coupon_id', 'DESC')->with('outlet')->withCount('earned')->withCount('redeemed')
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
        return view('admin.reports.coupons', compact('page_heading', 'datamain','outlets'));
    }
    public function userEarning(Request $request)
    {
        $page_heading = "User Earning";
        $datamain = User::select('*', 'users.name as name', 'users.active as active', 'users.id as id', 'users.updated_at as updated_at')
            ->where(['role' => '2', 'users.deleted' => '0','users.phone_verified' => '1'])            
            ->orderBy('users.id', 'desc')->get();

        return view('admin.reports.customer_earning', compact('page_heading', 'datamain'));
    }

    public function exportCustomers(Request $request)
    {
        return Excel::download(new ReportCustomerExport($request), 'customer_report.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function exportOutlet(Request $request)
    {
        return Excel::download(new ReportOutletExport($request), 'outlet_report.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
    public function exportCoupon(Request $request)
    {
        return Excel::download(new ReportCouponExport($request), 'vouchers.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
    public function exportRating(Request $request)
    {
        return Excel::download(new ReportExportRating($request), 'rating.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
    public function exportCouponStatistics(Request $request)
    {
        return Excel::download(new ReportCouponUsageStatistics($request), 'vouchers_usage.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
     
}
