<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class VendorModel extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = "users";
    public $timestamps = false;

    // protected $fillable = ['name', 'email', 'dial_code','phone','role','first_name','user_name','last_name','user_image',
    // 'password','country_id','state_id','city_id','area','vendor','store','previllege','created_at','updated_at','designation_id','active','dob'];

    protected $guarded = [];
    
    public $appends = ['share_url'];

    public function operatingHours(): HasMany
    {
        return $this->hasMany(OperatingHours::class, 'vendor_id');
    }
    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'vendor_id');
    }

    public function getShareUrlAttribute(){
        return url('/share/outlet/'.$this->id);
    }

    public function getUserImageAttribute($value)
    {
        if($value)
        {
            return get_uploaded_image_url($value,'user_image_upload_dir');
            return asset($value);
        }
        else
        {
            return get_uploaded_image_url($value,'user_image_upload_dir');
        }
    }
    public function getTradeLicenseAttribute($value){
      return get_uploaded_image_url($value,'user_image_upload_dir');
    }
    public function vendordata() {
       return $this->hasMany(VendorDetailsModel::class,'user_id');
    }
   
    public function stores() {
        return $this->hasMany('App\Models\Stores', 'vendor_id', 'id'); 
    }
    

    function menu(){
        $this->hasOne(Menu::class, 'vendor_id', 'id');
    }
    public function user_location(){
        return $this->hasOne('App\Models\UserLocations', 'user_id', 'id');
    }
    public function getBannerImageAttribute($value){
        return get_uploaded_image_url($value,'user_image_upload_dir');
    }
    public function maincategory() {
      return $this->belongsTo(Categories::class,'main_category_id');
   }


}
