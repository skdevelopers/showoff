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
use DB,Auth;

class ReportExportRating implements FromQuery, WithProperties, WithColumnFormatting, WithColumnWidths, WithHeadings, WithMapping
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
        if(Auth::user()->role == 4) {
            $ky = [
                'Customer Name',
                'Customer Email',
                'Customer Phone',           
                'Rating',
                'Review',
                'Created',         
                ];
        } else {
            $ky = [
                'Customer Name',
                'Customer Email',
                'Customer Phone',
                'Outlet Name',           
                'Outlet Email',
                'Outlet Phone',
                'Rating',
                'Review',
                'Created'          
               
                
            ];
        }
        
        return $ky;
    }

    public function map($rating): array
    {
        if(Auth::user()->role == 4) {
            $val = [
                $rating->customer->name,
                $rating->customer->email,
                $rating->customer->dial_code.$rating->customer->phone,                
                $rating->rating,
                $rating->reviews,
                $rating->created_at          
                
            ];
        } else {
            $val = [
                $rating->customer->name,
                $rating->customer->email,
                $rating->customer->dial_code.$rating->customer->phone,
                $rating->outlet->name,
                $rating->outlet->email,
                $rating->outlet->dial_code.$rating->outlet->phone,
                $rating->rating,
                $rating->reviews,
                $rating->created_at          
                
            ];
        }
        return $val;
    }

    public function query()
    {
        
        $datamain = \App\Models\Review::orderBy('id','desc')->with(['outlet'=>function($q){
            $q->select('id','name','email','dial_code','phone');
        },'customer'=>function($q){
            $q->select('id','name','email','dial_code','phone');
        }]);

        if(isset($this->request->from_date))  {
            
            $datamain =$datamain ->whereDate('created_at','>=',$this->request->from_date);
        }
        if(isset($this->request->to_date))  {
            
            $datamain =$datamain ->whereDate('created_at','<=',$this->request->to_date);
        }
        if(isset($this->request->outlet_id))  {
            
            $datamain =$datamain ->where('outlet_id',$this->request->outlet_id);
        }
        return $datamain;
    }
}
