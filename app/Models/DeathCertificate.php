<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeathCertificate extends Model
{
    use HasFactory;
    protected $table = 'deathcertificate';
    protected $fillable = [
        'user_id',
        'date_of_death',
        'deceased_name',
        'deceased__uid_number',
        'mother_name',
        'mother_uid_number',
        'father_name',
        'father_uid_number',
        'spouse_names',
        'spouse_uid_number',
        'death_person_age',
        'time_of_death_address',
        'address_of_death_person',
        'hospital_institution',
        'home_path',
        'another_location',
        'name_of_informant',
        'path',
        'mobile_number',
        'email_id',
        'city_or_village_name',
        'city_or_village',
        'religion',
        'occupation',
        'received_treatment_before_death',
        'medical_certified',
        'disease_name',
        'female_death',
        'smoking_addicted',
        'chewing_tobacco',
        'chewing_betel_nut',
        'alchol_addicted'
    ];
   
}
