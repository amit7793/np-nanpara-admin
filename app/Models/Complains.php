<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complains extends Model
{
    use HasFactory;
    protected $table = 'complains';
    protected $fillable = [
        'user_id',
        'name',
        'mobile_number',
        'email_id',
        'complain',
        'status',
        'remark',
    ];
}
