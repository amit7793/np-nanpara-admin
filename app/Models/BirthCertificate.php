<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirthCertificate extends Model
{
    use HasFactory;
    protected $table = 'birthcertificate';
    protected $fillable = [
        'user_id',
        'date_of_birth',
        'gender',
        'name',
        'name_of_father',
        'name_of_mother',
        'address_parent_child',
        'permanent_address',
        'place_of_birth',
        'name_of_informant',
        'mobile_number',
        'address',
        'email_id',
        'mother_resides_place',
        'family_tradition',
        'father_educational_level',
        'mother_educational_level',
        'father_business',
        'mother_age_at_marriage',
        'time_of_child_birth',
        'uninhabited_people_this_year_of_mother',
        'Under_auspices_delivery_take_place',
        'time_of_conception',
        'weight_at_birth',
        'remark',
        'status'
    ];
}
