<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WastageCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_12',
        'mobile',
        'email',
        'user_id',
        'status',
        'remark',
    ];
}
