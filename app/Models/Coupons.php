<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    use HasFactory;

    protected $table = "coupon";

    public $timestamps = false;

    public function getAppliedToText()
    {
        $text ='';
        return $text;
    }
    public function getImageAttribute($value){
      return get_uploaded_image_url($value,'coupon_upload_dir');
    }
    public function getPolicyAttribute($value){
      return get_uploaded_image_url($value,'coupon_upload_dir');
    }
    public function outlet() {
       return $this->belongsTo(VendorModel::class,'outlet_id');
    }
    public function videos(){
      return $this->hasMany('App\Models\CouponUnlockVideos','coupon_id', 'coupon_id');
    }
    public function earned(){
      return $this->hasMany('App\Models\CouponOrder','coupon_id', 'coupon_id');
    }
    public function redeemed(){
      return $this->hasMany('App\Models\CouponOrder','coupon_id', 'coupon_id')->where('status',1);
    }
    public function amounttype(){
      return $this->belongsTo('App\Models\AmountType','amount_type', 'id');
    }
    public function ratings(){
      return $this->belongsTo('App\Models\AmountType','amount_type', 'id');
    }
    public function banners(){
      return $this->hasMany('App\Models\CouponImages','coupon_id', 'coupon_id');
    }

}
