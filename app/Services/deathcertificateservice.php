<?php
namespace App\Services;

use App\Models\DeathCertificate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class deathcertificateservice
{

    public function deathCertificateSave($request,$user_id)
    {
        try {

            
            $deathCertificate = [
                'user_id' => $user_id ?? null,
               'date_of_death' => $request['date_of_death'] ?? null,
           'deceased_name' => $request['deceased_name'] ?? null,
           'deceased__uid_number' => $request['deceased__uid_number'] ?? null,
           'mother_name' => $request['mother_name'] ?? null,
           'mother_uid_number' => $request['mother_uid_number'] ?? null,
           'father_name' => $request['father_name'] ?? null,
           'father_uid_number' => $request['father_uid_number'] ?? null,
           'spouse_names' => $request['spouse_names'] ?? null,
           'spouse_uid_number' => $request['spouse_uid_number'] ?? null,
           'death_person_age' => $request['death_person_age'] ?? null,
           'time_of_death_address' => $request['time_of_death_address'] ?? null,
           'address_of_death_person' => $request['address_of_death_person'] ?? null,
           'hospital_institution' => $request['hospital_institution'] ?? null,
           'home_path' => $request['home_path'] ?? null,
           'another_location' => $request['another_location'] ?? null,
           'name_of_informant' => $request['name_of_informant'] ?? null,
           'path' => $request['path'] ?? null,
           'mobile_number' => $request['mobile_number'] ?? null,
           'email_id' => $request['email_id'] ?? null,
           'city_or_village_name' => $request['city_or_village_name'] ?? null,
           'city_or_village' => $request['city_or_village'] ?? null,
           'religion' => $request['religion'] ?? null,
           'occupation' => $request['occupation'] ?? null,
           'received_treatment_before_death' => $request['received_treatment_before_death'] ?? null,
           'medical_certified' => $request['medical_certified'] ?? null,
           'disease_name' => $request['disease_name'] ?? null,
           'female_death' => $request['female_death'] ?? null,
           'smoking_addicted' => $request['smoking_addicted'] ?? null,
           'chewing_tobacco' => $request['chewing_tobacco'] ?? null,
           'chewing_betel_nut' => $request['chewing_betel_nut'] ?? null,
           'alchol_addicted' => $request['alchol_addicted'] ?? null,
              ];
              $deathCertificateData = DeathCertificate::create($deathCertificate);
            return $deathCertificateData;
        } catch (\Exception $e) {
            Log::error('Error creating deathCertificate: ' . $e->getMessage());
            throw new \Exception('Failed to create deathCertificate');
        } 
    }
}