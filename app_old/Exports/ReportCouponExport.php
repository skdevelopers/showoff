<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\User;
use DB;

class ReportCouponExport implements FromQuery, WithProperties, WithColumnFormatting, WithColumnWidths, WithHeadings, WithMapping
{
    public $request;
    public function __construct(\Illuminate\Http\Request  $pRequest) {
        $this->request = $pRequest;
    }
    
    public function properties(): array
    {
        return [
            'creator'        => '',
           
        ];
    }

    public function columnFormats(): array
    {
        return [
           
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 25,
            'B' => 20,      
            'C' => 25,
            'D' => 15,
            'E' => 15,  
            'F' => 30,
            'G' => 15,
            'H' => 15,
            
        ];
    }

    public function headings(): array
    {
        return [
            // 'Code',
            'Name',
            'Outlet',
            'Category',
            'Discount Type',
            'Description',
            'Start Date',
            'Expiry Date',
            // 'Amount Earn/Coupon',
            'Usage limit per person',
            'Usage limit per voucher',
            'Total Users Applied',
            "Total Users Redeemed",
            'Status'
           
           
            
        ];
    }

    public function map($coupon): array
    {
        //print_r($user); die();
        return [
            // $coupon->coupon_code,
            $coupon->coupon_title,
            $coupon->outlet->name,
            isset($coupon->outlet->maincategory) ? $coupon->outlet->maincategory->name : '',
            $coupon->amounttype->name,
            $coupon->coupon_description,
            date('d-M-Y', strtotime($coupon->start_date)),
            date('d-M-Y', strtotime($coupon->coupon_end_date)),
            // $coupon->minimum_amount,
            $coupon->coupon_usage_peruser,
            $coupon->coupon_usage_percoupon,
            $coupon->earned_count,
            $coupon->redeemed_count,
            $coupon->coupon_status == 1 ? 'Active' : 'Inactive'
           
            
        ];
    }

     public function query()
    {
        
        $datamain = \App\Models\Coupons::orderBy('coupon_id', 'DESC')->with('outlet','outlet.maincategory','amounttype')->withCount('earned')->withCount('redeemed')
        ->leftjoin('amount_type','amount_type.id','=','coupon.amount_type');
        if(isset($this->request->search_key)) {
            $datamain = $datamain ->whereRaw("(coupon_code ilike '%".$this->request->search_key."%')");
        }
        if(isset($this->request->status)) {
            $datamain = $datamain ->where('coupon_status',$this->request->status);
        }
        if(isset($this->request->outlet_id)) {
            $datamain = $datamain ->where('outlet_id',$this->request->outlet_id);
        }
        if(isset($this->request->date)) {
            $datamain = $datamain ->where('start_date','<=',date('Y-m-d',strtotime($this->request->date)))->where('coupon_end_date','>=',date('Y-m-d',strtotime($this->request->date)));
        }
        return $datamain;
    }
}
