<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TradeSubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categoryDetails()
    {
        return $this->hasOne(TradeCategory::class, 'id', 'category_id');
    }

}
