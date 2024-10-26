<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplainMessage extends Model
{
    use HasFactory;
    protected $table = 'complains_messages';
    protected $fillable = [
        'complain_id',
        'user_id',
        'send',
        'message',
        'received',
    ];
}
