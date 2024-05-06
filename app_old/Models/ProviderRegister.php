<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProviderRegister extends Model
{
    protected $table = "provider_registration";
    protected $primaryKey = "id";
    protected $fillable = [
        'name','email','dial_code','phone','main_category_id',
        'username','status','otp','image','location','banners',
        'latitude','longitude','about_me','password','user_image',
        'trade_license','country_id','city_id','email_verified','state_id'
    ];
    public function category() {
        return $this->belongsTo('App\Models\Categories', 'main_category_id', 'id');
    }
    //  public function getTradeLicenseAttribute($value){
    //   return get_uploaded_image_url($value,'user_image_upload_dir');
    // }
    // public function getImageAttribute($value){
    //     return get_uploaded_image_url($value,'user_image_upload_dir');
    //   }
    public function country() {
        return $this->belongsTo('App\Models\CountryModel', 'country_id', 'id');
    }
    public function state() {
        return $this->belongsTo('App\Models\States', 'state_id', 'id');
    }
    public function city() {
        return $this->belongsTo('App\Models\Cities', 'city_id', 'id');
    }
}