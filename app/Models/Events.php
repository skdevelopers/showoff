<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Events extends Model
{
    use HasFactory;
    protected $table = "events";
    protected $guarded = [];
    public function getImageAttribute($value)
    {
        if($value)
        {
            return asset('storage/users/'.$value);
        }
        else
        {
            return asset('uploads/company/17395e3aa87745c8b488cf2d722d824c.jpg');
        }
    }
}
