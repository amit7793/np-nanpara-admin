<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyAdvertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_price',
        'advertisement_id',
        'user_id',
        'remark',
        'status',
        'chalan_number',
    ];

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class, 'advertisement_id');
    }
}
