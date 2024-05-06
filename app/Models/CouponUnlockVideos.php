<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponUnlockVideos extends Model
{
    use HasFactory;

    protected $table = "coupon_unlock_videos";

    public $timestamps = true;
    public function coupon() {
       return $this->belongsTo(Coupons::class,'coupon_id','coupon_id');
    }
    public function video() {
       return $this->belongsTo(Videos::class,'video_id','id');
    }
}