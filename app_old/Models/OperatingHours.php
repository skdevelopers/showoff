<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatingHours extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'day_of_week',
        'open_time',
        'close_time'
    ];

    public function vendor()
    {
        return $this->belongsTo(VendorModel::class, 'vendor_id');
    }
}
