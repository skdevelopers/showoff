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

class ReportOutletExport implements FromQuery, WithProperties, WithColumnFormatting, WithColumnWidths, WithHeadings, WithMapping
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
            'Name',
            'Email',
            'Mobile No',           
            'Location',
            'User Lattitude',
            'User Longitude',
            'Category',
            'Description',
            'Business Type',
            "Total Coupons Added",
            "Created",
           
            
        ];
    }

    public function map($user): array
    {
        
        return [
            $user->name,
            $user->email,
            $user->dial_code.$user->phone,
            $user->location,
            $user->latitude,
            $user->longitude,
            $user->main_category_id > 0 ? $user->maincategory->name :'',
            $user->about_me,
            $user->business_type,
            $user->coupon_count,
            
            $user->created_at,
           
            
        ];
    }

     public function query()
    {
        
        $datamain = \App\Models\User::select('*', 'users.name as name', 'users.active as active', 'users.id as id', 'users.updated_at as updated_at')->withCount('coupon')
            ->with('maincategory')
            ->where(['role' => '4', 'users.deleted' => '0','users.phone_verified' => '1'])
            ->with(['country','city']);
           

        if(isset($this->request->from_date))  {
            
            $datamain =$datamain ->whereDate('created_at','>=',date('Y-m-d',strtotime($this->request->from_date)));
        }
        if(isset($this->request->to_date))  {
            
            $datamain =$datamain ->whereDate('created_at','<=',date('Y-m-d',strtotime($this->request->to_date)));
        }
        return $datamain;
    }
}
