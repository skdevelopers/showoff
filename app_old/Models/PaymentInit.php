<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInit extends Model
{
    use HasFactory;
    protected $table = "payment_init";
    protected $primaryKey = "id";

    protected $guarded = [];

}
