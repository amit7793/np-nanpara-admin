<?php
namespace App\Services;

use App\Models\BirthCertificate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class birthcertificateservice
{
    
    public function birthCertificateSave($request,$user_id)
    {
        try {

            
            $birthCertificate = [
                'user_id' => $user_id ?? null,
                'date_of_birth' => $request['date_of_birth'] ?? null,
                'gender' => $request['gender'] ?? null,
                'name' => $request['name'] ?? null,
                'name_of_father' => $request['name_of_father'] ?? null,
                'name_of_mother' => $request['name_of_mother'] ?? null,
                'address_parent_child' => $request['address_parent_child'] ?? null,
                'permanent_address' => $request['permanent_address'] ?? null,
                'place_of_birth' => $request['place_of_birth'] ?? null,
                'name_of_informant' => $request['name_of_informant'] ?? null,
                'mobile_number' => $request['mobile_number'] ?? null,
                'address' => $request['address'] ?? null,
                'email_id' => $request['email_id'] ?? null,
                'mother_resides_place' => $request['mother_resides_place'] ?? null,
                'family_tradition' => $request['family_tradition'] ?? null,
                'father_educational_level' => $request['father_educational_level'] ?? null,
                'mother_educational_level' => $request['mother_educational_level'] ?? null,
                'father_business' => $request['father_business'] ?? null,
                'mother_age_at_marriage' => $request['mother_age_at_marriage'] ?? null,
                'time_of_child_birth' => $request['time_of_child_birth'] ?? null,
                'uninhabited_people_this_year_of_mother' => $request['uninhabited_people_this_year_of_mother'] ?? null,
                'Under_auspices_delivery_take_place' => $request['Under_auspices_delivery_take_place'] ?? null,
                'time_of_conception' => $request['time_of_conception'] ?? null,
                'weight_at_birth' => $request['weight_at_birth'] ?? null
              ];
              $birthCertificateData = BirthCertificate::create($birthCertificate);
            return $birthCertificateData;
        } catch (\Exception $e) {
            dd($e);
            Log::error('Error creating birthCertificate: ' . $e->getMessage());
            throw new \Exception('Failed to create birthCertificate');
        } 
    }

}