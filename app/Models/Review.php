<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  protected $table = "review";
  protected $primaryKey = "id";
  public function outlet() {
     return $this->belongsTo(VendorModel::class,'outlet_id');
  }
  public function customer(){
    return $this->belongsTo(VendorModel::class,'user_id');
  }
}
