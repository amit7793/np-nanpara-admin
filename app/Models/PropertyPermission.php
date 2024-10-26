<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPermission extends Model
{
    use HasFactory;
    protected $table = 'properties_permission';
    protected $fillable = [
        'user_id',
        'property',
        'details_of_owner',
        'land_building_description',
        'land_building_description_b',
        'land_building_description_c',
        'land_building_situated',
        'land_located',
        'building_owner_rent',
        'nature_building_construction',
        'construction_year',
        'predetermind_value_year',
        'annual_value_building',
        'annual_value_land',
        'total_annual_value',
        'action_type',
        'amount',
        'approval_date',
        'remark',
        'status',
        'chalan_number',
        'payment_status',
    ];
}
