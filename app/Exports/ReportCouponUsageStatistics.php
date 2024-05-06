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

class ReportCouponUsageStatistics implements FromQuery, WithProperties, WithColumnFormatting, WithColumnWidths, WithHeadings, WithMapping
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
            'Voucher Title',
            'Customer',
            'Email',
            'Phone',
            'Status',
            'Created At',
           
           
            
        ];
    }

    public function map($coupon): array
    {
        //print_r($user); die();
        return [
            $coupon->coupon_details->coupon_title??'',
            $coupon->customer->name??'',
            $coupon->customer->email??'',
            !empty($coupon->customer) ? $coupon->customer->dial_code.$coupon->customer->phone : '',
            $coupon->status == 0 ? 'Earned' : 'Redeemed',
            date('d-M-Y',strtotime($coupon->created_at)),
            
           
            
        ];
    }

     public function query()
    {
        
        $datamain = \App\Models\CouponOrder::with(['coupon_details'=>function($q){
            $q->select('coupon_id','coupon_title');
        },'customer'=>function($q){
            $q->select('id','name','email','dial_code','phone');
        }])->join('coupon','coupon.coupon_id','coupon_order.coupon_id')->orderBy('id','desc')->select('coupon_order.*');
        if(isset($this->request->search_key)) {
            $datamain = $datamain ->where('coupon_code',$this->request->search_key);
        }
        if(isset($this->request->user_id)) {
            $datamain = $datamain ->where('user_id',$this->request->user_id);
        }
        if(isset($this->request->outlet_id)) {
            $datamain = $datamain ->where('coupon.outlet_id',$this->request->outlet_id);
        }
        return $datamain;
    }
}
