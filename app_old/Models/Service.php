<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['vendor_id', 'name', 'description', 'price','image','slug','background_image'];

    // Define relationships if needed (e.g., vendor relationship)
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(VendorModel::class, 'vendor_id');
    }
}
