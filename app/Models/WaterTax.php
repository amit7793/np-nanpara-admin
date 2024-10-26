<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterTax extends Model
{
    use HasFactory;

    protected $fillable = [
        'emitra_12_code',
        'mobile',
        'email',
        'user_id',
        'status',
        'remark',
    ];
}
