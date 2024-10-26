<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        "image",
        "price",
        "mobile",
        "width",
        "height",
        "adderss",
        "city",
        "pincode",
        "status",
        "payment_status",
        "amount",
        "remaining",
        "booked",
    ];

    public function applications()
    {
        return $this->hasMany(ApplyAdvertisement::class, 'advertisement_id');
    }
}
