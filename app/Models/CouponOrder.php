<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CouponOrder extends Model
{
    protected $table = 'coupon_order';

    function coupon_details(){
        return $this->hasOne(Coupons::class, 'coupon_id', 'coupon_id');
    }
    function customer(){
        return $this->hasOne(User::class, 'id', 'customer_id');
    }
    function outlet_details(){
        return $this->hasOne(VendorModel::class, 'id', 'outlet_id');
    }
    
}
