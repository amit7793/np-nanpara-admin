<?php

namespace App\Http\Controllers;

use App\Models\WaterTax;
use App\Models\Marriage;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\TradeLicense;
use App\Models\DeathCertificate;
use App\Models\BirthCertificate;
use App\Models\TradeLicenseUnit;
use App\Models\TradeLicenseOwner;
use App\Models\WastageCollection;
use Illuminate\Support\Facades\Log;

class BillGenerationController extends Controller
{
    public function billGeneration()
    {
        try {
            return view('bill-generation.main');
        } catch (\Exception $e) {
            Log::error('Error in billGeneration: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load the bill generation page. Please try again later.');
        }
    }

    public function propertyTaxBill()
    {
        try {
            $property = Property::orderBy('id', 'DESC')->get();

            return view('bill-generation.property-tax', compact('property'));
        } catch (\Exception $e) {
            Log::error('Error in propertyTaxBill: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load the property tax information. Please try again later.');
        }
    }

    public function propertyTaxBillView($id)
    {
        try {
            $property = Property::findOrFail($id);

            $propertyValue = $property->property === "Residential"
                ? $property->res_monthly_rate ?? 0
                : $property->total_annual_value ?? 0;

            $deedCharge = match (true) {
                $propertyValue >= 1 && $propertyValue < 99999 => 1000,
                $propertyValue >= 100000 && $propertyValue <= 299999 => 2000,
                $propertyValue >= 300000 && $propertyValue <= 599999 => 3000,
                $propertyValue >= 600000 && $propertyValue <= 1499999 => 6000,
                default => 10000,
            };

            $charges = [
                'PropertyValue' => $propertyValue,
                'deedCharge' => $deedCharge,
                'TotalAmount' => $propertyValue + $deedCharge,
            ];

            $view = $property->property === 'Non Residential'
                ? 'bill-generation.my-property-nonresidential-view'
                : 'bill-generation.my-property-residential-view';

            return view($view, [
                "property" => $property,
                "charges" => $charges,
            ]);
        } catch (\Exception $e) {
            Log::error("Error in propertyTaxBillView (Property ID: $id): " . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function birthBill()
    {
        try {
            $birthcertificates = BirthCertificate::orderBy('id', 'DESC')->get();
            return view('bill-generation.birth', compact('birthcertificates'));
        } catch (\Exception $e) {
            Log::error('Error in birthBill: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load birth certificates. Please try again.');
        }
    }

    public function birthBillView($id)
    {
        try {
            $birthcertificate = BirthCertificate::findOrFail($id);
            return view('bill-generation.birth-view', compact('birthcertificate'));
        } catch (\Exception $e) {
            Log::error("Error in birthBillView (ID: $id): " . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load the birth certificate details. Please try again.');
        }
    }

    public function deathBill()
    {
        try {
            $deathcertificate = DeathCertificate::OrderBy('id', 'DESC')->get();
            return view('bill-generation.death', compact('deathcertificate'));
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function deathBillView($id)
    {
        try {

            $deathcertificate = deathCertificate::where('id', $id)->first();

            return view('bill-generation.death-view', compact('deathcertificate'));
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function marriageBill()
    {
        try {
            $marriage = Marriage::OrderBy('id', "Desc")->get();
            return view('bill-generation.marriage', compact('marriage'));
        } catch (\Exception $e) {
            Log::error('Error something want to wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function marriageBillView($id)
    {
        try {
            $marriage = Marriage::where('id', $id)->first();
            return view('bill-generation.marriage-view', compact('marriage'));
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function tradeLicenseBill()
    {
        try {
            $trades = TradeLicense::OrderBy('id', "Desc")->get();
            return view('bill-generation.trade-license', compact('trades'));
        } catch (\Exception $e) {
            Log::error('Error something want to wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function tradeLicenseBillView($id)
    {
        try {
            $trades = TradeLicense::where('id', $id)->first();
            $tradeUnits = TradeLicenseUnit::where('trade_id', $id)->get();
            $tradeOwners = TradeLicenseOwner::where('trade_id', $id)->get();
            return view('bill-generation.trade-license-view', compact('trades', 'tradeUnits', 'tradeOwners'));
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function wastageBill()
    {
        try {
            $data = WastageCollection::orderBy('id', 'DESC')->get();
            return view('bill-generation.wastage', compact('data'));
        } catch (\Exception $e) {
            Log::error('Error in wastageBill: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load wastage collections. Please try again.');
        }
    }

    public function wastageBillView($id)
    {
        try {
            $data = WastageCollection::where('id', $id)->first();
            if (!$data) {
                return redirect()->back()->with('error', 'Wastage collection not found. Please try again.');
            }

            return view('bill-generation.wastage-view', compact('data'));
        } catch (\Exception $e) {
            Log::error("Error in wastageBillView (ID: $id): " . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load the wastage collection details. Please try again.');
        }
    }

    public function waterBill()
    {
        try {
            $data = WaterTax::orderBy('id', 'desc')->get();
            return view('bill-generation.water', compact('data'));
        } catch (\Exception $e) {
            Log::error('Error in waterTax: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load water taxes. Please try again.');
        }
    }

    public function waterBillView($id)
    {
        try {
            $data = WaterTax::findOrFail($id);

            if (!$data) {
                return redirect()->back()->with('error', 'Water tax record not found. Please try again.');
            }

            return view('bill-generation.water-view', compact('data'));
        } catch (\Exception $e) {
            Log::error("Error in waterView (ID: $id): " . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load the water tax details. Please try again.');
        }
    }

    //excel import functions
    public function exportPropertyBill()
    {
        try {
            $propertyData = Property::orderBy('id', 'DESC')->get();

            $filename = "property_tax_report.csv";
            $handle = fopen($filename, 'w+');

            if ($handle === false) {
                throw new \Exception("Unable to open file for writing.");
            }

            fputcsv($handle, [
                'S.No.',
                'Date',
                'Applicant Name',
                'Property Type',
                'Applicant Number',
                'Status',
                'Payment Status'
            ]);

            foreach ($propertyData as $index => $item) {
                fputcsv($handle, [
                    $index + 1,
                    isset($item->created_at) ? $item->created_at->format('d-m-Y') : 'NA',
                    $item->name_chairman_owner ?? 'NA',
                    $item->property ?? 'NA',
                    $item->id ?? 'NA',
                    $item->status == 0 ? 'Pending' : ($item->status == 1 ? 'Approved' : 'Rejected'),
                    $item->payment_status == 0 ? 'Due' : 'Paid'
                ]);
            }

            fclose($handle);

            $headers = [
                'Content-Type' => 'text/csv',
            ];

            return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error('Failed to export property tax data: ' . $e->getMessage());

            return response()->json([
                'error' => 'Failed to export property tax data. Please try again later.'
            ], 500);
        }
    }

    public function exportBirthBill()
    {
        try {
            $birthCertificates = BirthCertificate::orderBy('id', 'DESC')->get();

            $filename = "birth_certificate_report.csv";
            $handle = fopen($filename, 'w+');

            if ($handle === false) {
                throw new \Exception("Unable to open file for writing.");
            }

            fputcsv($handle, [
                'S.No.',
                'Date',
                'Applicant Name',
                'Birth Certificate ID',
                'Status',
                'Payment Status'
            ]);

            foreach ($birthCertificates as $index => $item) {
                fputcsv($handle, [
                    $index + 1,
                    isset($item->created_at) ? $item->created_at->format('d-m-Y') : 'NA',
                    $item->name ?? 'NA',
                    $item->id ?? 'NA',
                    $item->status == 0 ? 'Pending' : ($item->status == 1 ? 'Approved' : 'Rejected'),
                    $item->payment_status == 0 ? 'Due' : 'Paid'
                ]);
            }

            fclose($handle);

            $headers = [
                'Content-Type' => 'text/csv',
            ];

            return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error('Failed to export birth certificate data: ' . $e->getMessage());

            return response()->json([
                'error' => 'Failed to export birth certificate data. Please try again later.'
            ], 500);
        }
    }

    public function exportBirthViewBill($id)
    {
        try {
            $birthcertificate = BirthCertificate::findOrFail($id);

            $filename = "birth_certificate_report_{$id}.csv";
            $handle = fopen($filename, 'w+');

            if ($handle === false) {
                throw new \Exception("Unable to open file for writing.");
            }

            fputcsv($handle, [
                'Field',
                'Details'
            ]);

            fputcsv($handle, ['Born Date', $birthcertificate->date_of_birth ?? 'NA']);
            fputcsv($handle, ['Gender', $birthcertificate->gender ?? 'NA']);
            fputcsv($handle, ['Newborn Name', $birthcertificate->name ?? 'NA']);
            fputcsv($handle, ['Father\'s Name', $birthcertificate->name_of_father ?? 'NA']);
            fputcsv($handle, ['Mother\'s Name', $birthcertificate->name_of_mother ?? 'NA']);
            fputcsv($handle, ['Time of Birth', $birthcertificate->time_of_child_birth ?? 'NA']);
            fputcsv($handle, ['Parents Address', $birthcertificate->address_parent_child ?? 'NA']);
            fputcsv($handle, ['Permanent Address', $birthcertificate->permanent_address ?? 'NA']);
            fputcsv($handle, ['Place of Birth', $birthcertificate->place_of_birth ?? 'NA']);
            fputcsv($handle, ['Informant Name', $birthcertificate->name_of_informant ?? 'NA']);
            fputcsv($handle, ['Informant Address', $birthcertificate->address ?? 'NA']);
            fputcsv($handle, ['Mobile Number', $birthcertificate->mobile_number ?? 'NA']);
            fputcsv($handle, ['Email ID', $birthcertificate->email_id ?? 'NA']);
            fputcsv($handle, ['Mother\'s Residence Place', $birthcertificate->mother_resides_place ?? 'NA']);
            fputcsv($handle, ['Family Tradition', $birthcertificate->family_tradition ?? 'NA']);
            fputcsv($handle, ['Father\'s Educational Level', $birthcertificate->father_educational_level ?? 'NA']);
            fputcsv($handle, ['Mother\'s Educational Level', $birthcertificate->mother_educational_level ?? 'NA']);
            fputcsv($handle, ['Father\'s Business', $birthcertificate->father_business ?? 'NA']);
            fputcsv($handle, ['Mother\'s Age at Marriage', $birthcertificate->mother_age_at_marriage ?? 'NA']);
            fputcsv($handle, ['Uninhabited People This Year', $birthcertificate->uninhabited_people_this_year_of_mother ?? 'NA']);
            fputcsv($handle, ['Under Auspices of Delivery', $birthcertificate->Under_auspices_delivery_take_place ?? 'NA']);
            fputcsv($handle, ['Time of Conception', $birthcertificate->time_of_conception ?? 'NA']);
            fputcsv($handle, ['Weight at Birth', $birthcertificate->weight_at_birth ?? 'NA']);

            fclose($handle);

            $headers = [
                'Content-Type' => 'text/csv',
            ];

            return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error("Failed to export birth certificate data for ID $id: " . $e->getMessage());

            return response()->json([
                'error' => 'Failed to export birth certificate data. Please try again later.'
            ], 500);
        }
    }

    public function exportDeathBill()
    {
        try {
            $deathCertificates = DeathCertificate::orderBy('id', 'DESC')->get();

            $filename = "death_certificate_report.csv";
            $handle = fopen($filename, 'w+');

            if ($handle === false) {
                throw new \Exception("Unable to open file for writing.");
            }

            fputcsv($handle, [
                'S.No.',
                'Date',
                'Deceased Name',
                'Death Certificate ID',
                'Status',
                'Payment Status'
            ]);

            foreach ($deathCertificates as $index => $item) {
                fputcsv($handle, [
                    $index + 1,
                    isset($item->created_at) ? $item->created_at->format('d-m-Y') : 'NA',
                    $item->deceased_name ?? 'NA',
                    $item->id ?? 'NA',
                    $item->status == 0 ? 'Waiting' : ($item->status == 1 ? 'Approved' : 'Rejected'),
                    $item->payment_status == 0 ? 'Due' : 'Paid'
                ]);
            }

            fclose($handle);

            $headers = [
                'Content-Type' => 'text/csv',
            ];

            return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error('Failed to export death certificate data: ' . $e->getMessage());

            return response()->json([
                'error' => 'Failed to export death certificate data. Please try again later.'
            ], 500);
        }
    }

    public function exportDeathViewBill($id)
    {
        try {
            $deathCertificate = DeathCertificate::findOrFail($id);

            $filename = "death_certificate_report_{$id}.csv";
            $handle = fopen($filename, 'w+');

            if ($handle === false) {
                throw new \Exception("Unable to open file for writing.");
            }

            fputcsv($handle, [
                'Field',
                'Details'
            ]);

            fputcsv($handle, ['Date of Death', $deathCertificate->date_of_death ?? 'NA']);
            fputcsv($handle, ['Name of the Deceased', $deathCertificate->deceased_name ?? 'NA']);
            fputcsv($handle, ['UID No. of the Deceased', $deathCertificate->deceased__uid_number ?? 'NA']);
            fputcsv($handle, ['Mother\'s Name', $deathCertificate->mother_name ?? 'NA']);
            fputcsv($handle, ['UID No. of the Mother', $deathCertificate->mother_uid_number ?? 'NA']);
            fputcsv($handle, ['Father\'s Name', $deathCertificate->father_name ?? 'NA']);
            fputcsv($handle, ['UID No of the Father', $deathCertificate->father_uid_number ?? 'NA']);
            fputcsv($handle, ['Name of Husband/Wife', $deathCertificate->spouse_names ?? 'NA']);
            fputcsv($handle, ['Spouse\'s UID No', $deathCertificate->spouse_uid_number ?? 'NA']);
            fputcsv($handle, ['Age of the Deceased', $deathCertificate->death_person_age ?? 'NA']);
            fputcsv($handle, ['Address of the Deceased at the time of Death', $deathCertificate->time_of_death_address ?? 'NA']);
            fputcsv($handle, ['Permanent Address of the Deceased', $deathCertificate->address_of_death_person ?? 'NA']);
            fputcsv($handle, ['Addicted to Alcohol', $deathCertificate->alchol_addicted ?? 'NA']);
            fputcsv($handle, ['Hospital/Institution', $deathCertificate->hospital_institution ?? 'NA']);
            fputcsv($handle, ['Home Path', $deathCertificate->home_path ?? 'NA']);
            fputcsv($handle, ['Other Location', $deathCertificate->another_location ?? 'NA']);
            fputcsv($handle, ['Name of Informant', $deathCertificate->name_of_informant ?? 'NA']);
            fputcsv($handle, ['Path', $deathCertificate->path ?? 'NA']);
            fputcsv($handle, ['Mobile Number', $deathCertificate->mobile_number ?? 'NA']);
            fputcsv($handle, ['Email ID', $deathCertificate->email_id ?? 'NA']);
            fputcsv($handle, ['City/Village Name', $deathCertificate->city_or_village_name ?? 'NA']);
            fputcsv($handle, ['Is it a City or a Village?', $deathCertificate->city_or_village ?? 'NA']);
            fputcsv($handle, ['Occupation of the Deceased', $deathCertificate->occupation ?? 'NA']);
            fputcsv($handle, ['Treatment Received Before Death', $deathCertificate->received_treatment_before_death ?? 'NA']);
            fputcsv($handle, ['Cause of Death Medically Certified?', $deathCertificate->medical_certified ?? 'NA']);
            fputcsv($handle, ['Name of the Disease or Actual Cause of Death', $deathCertificate->disease_name ?? 'NA']);
            fputcsv($handle, ['Female Death During Pregnancy?', $deathCertificate->female_death ?? 'NA']);
            fputcsv($handle, ['Smoking Addiction Duration', $deathCertificate->smoking_addicted ?? 'NA']);
            fputcsv($handle, ['Chewing Tobacco Addiction Duration', $deathCertificate->chewing_tobacco ?? 'NA']);
            fputcsv($handle, ['Betel Nut Addiction Duration', $deathCertificate->chewing_betel_nut ?? 'NA']);
            fputcsv($handle, ['Religion', $deathCertificate->religion ?? 'NA']);

            fclose($handle);

            $headers = [
                'Content-Type' => 'text/csv',
            ];

            return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error("Failed to export death certificate data for ID $id: " . $e->getMessage());

            return response()->json([
                'error' => 'Failed to export death certificate data. Please try again later.'
            ], 500);
        }
    }

    public function exportMarriageBill()
    {
        try {
            $marriages = Marriage::orderBy('id', 'DESC')->get();

            $filename = "marriage_bill_report.csv";
            $handle = fopen($filename, 'w+');

            if ($handle === false) {
                throw new \Exception("Unable to open file for writing.");
            }

            fputcsv($handle, [
                'S.No.',
                'Date',
                'Application ID',
                'Applicant Name',
                'Status',
                'Payment Status'
            ]);

            foreach ($marriages as $index => $marriage) {
                fputcsv($handle, [
                    $index + 1,
                    isset($marriage->created_at) ? $marriage->created_at->format('d-m-Y') : 'NA',
                    $marriage->id ?? 'NA',
                    $marriage->bride_name ?? 'NA',
                    $marriage->status == 0 ? 'Waiting' : ($marriage->status == 1 ? 'Approved' : 'Rejected'),
                    $marriage->payment_status == 0 ? 'Due' : 'Paid'
                ]);
            }

            fclose($handle);

            $headers = [
                'Content-Type' => 'text/csv',
            ];

            return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error('Failed to export marriage bill data: ' . $e->getMessage());

            return response()->json([
                'error' => 'Failed to export marriage bill data. Please try again later.'
            ], 500);
        }
    }

    public function exportMarriageViewBill($marriageId)
    {
        $marriage = Marriage::find($marriageId);

        $csvData = [
            // 1. Marriage Details
            ['===== MARRIAGE DETAILS ====='],
            ['Field', 'Value'],
            ['Marriage Place', $marriage->marriage_place ?? 'NA'],
            ['City', $marriage->city ?? 'NA'],
            ['Village', $marriage->village ?? 'NA'],
            ['Ward Name', $marriage->ward_name ?? 'NA'],
            ['Marriage Date', $marriage->marriage_date ?? 'NA'],
            ['Pincode', $marriage->pin_code ?? 'NA'],
            [],

            // 2. Bride Details
            ['===== BRIDE DETAILS ====='],
            ['Field', 'Value'],
            ['Bride Name', $marriage->bride_name ?? 'NA'],
            ['Date of Birth', $marriage->bride_date_of_birth ?? 'NA'],
            ['Contact', $marriage->bride_contact ?? 'NA'],
            ['Email', $marriage->bride_email ?? 'NA'],
            ['Father Name', $marriage->bride_father_name ?? 'NA'],
            ['Mother Name', $marriage->bride_mother_name ?? 'NA'],
            ['Address', $marriage->bride_address ?? 'NA'],
            ['District', $marriage->bride_district ?? 'NA'],
            ['State', $marriage->bride_state ?? 'NA'],
            ['Country', $marriage->bride_country ?? 'NA'],
            ['Pin Code', $marriage->bride_pincode ?? 'NA'],
            ['Divyang', $marriage->bride_divyang ? 'Yes' : 'No'],
            [],

            // 3. Groom Details
            ['===== GROOM DETAILS ====='],
            ['Field', 'Value'],
            ['Groom Name', $marriage->groom_name ?? 'NA'],
            ['Date of Birth', $marriage->groom_date_of_birth ?? 'NA'],
            ['Contact', $marriage->groom_contact ?? 'NA'],
            ['Email', $marriage->groom_email ?? 'NA'],
            ['Father Name', $marriage->groom_father_name ?? 'NA'],
            ['Mother Name', $marriage->groom_mother_name ?? 'NA'],
            ['Address', $marriage->groom_address ?? 'NA'],
            ['District', $marriage->groom_district ?? 'NA'],
            ['State', $marriage->groom_state ?? 'NA'],
            ['Country', $marriage->groom_country ?? 'NA'],
            ['Pin Code', $marriage->groom_pincode ?? 'NA'],
            ['Divyang', $marriage->groom_divyang ? 'Yes' : 'No'],
            [],

            // 4. Bride Guardian Details
            ['===== BRIDE GUARDIAN DETAILS ====='],
            ['Field', 'Value'],
            ['Relation With Bride', $marriage->bride_guardian_relation_with_bride ?? 'NA'],
            ['Guardian Name', $marriage->bride_guardian_name ?? 'NA'],
            ['Address', $marriage->bride_guardian_address ?? 'NA'],
            ['District', $marriage->bride_guardian_district ?? 'NA'],
            ['State', $marriage->bride_guardian_state ?? 'NA'],
            ['Country', $marriage->bride_guardian_country ?? 'NA'],
            ['Pin Code', $marriage->bride_guardian_pincode ?? 'NA'],
            ['Contact', $marriage->bride_guardian_contact ?? 'NA'],
            ['Email', $marriage->bride_guardian_email ?? 'NA'],
            [],

            // 5. Groom Guardian Details
            ['===== GROOM GUARDIAN DETAILS ====='],
            ['Field', 'Value'],
            ['Relation With Bride', $marriage->groom_guardian_relation_with_bride ?? 'NA'],
            ['Guardian Name', $marriage->groom_guardian_name ?? 'NA'],
            ['Address', $marriage->groom_guardian_address ?? 'NA'],
            ['District', $marriage->groom_guardian_district ?? 'NA'],
            ['State', $marriage->groom_guardian_state ?? 'NA'],
            ['Country', $marriage->groom_guardian_country ?? 'NA'],
            ['Pin Code', $marriage->groom_guardian_pincode ?? 'NA'],
            ['Contact', $marriage->groom_guardian_contact ?? 'NA'],
            ['Email', $marriage->groom_guardian_email ?? 'NA'],
            [],

            // 6. Bride Witness Details
            ['===== BRIDE WITNESS DETAILS ====='],
            ['Field', 'Value'],
            ['Name', $marriage->bride_witness_name ?? 'NA'],
            ['Address', $marriage->bride_witness_address ?? 'NA'],
            ['District', $marriage->bride_witness_district ?? 'NA'],
            ['State', $marriage->bride_witness_state ?? 'NA'],
            ['Country', $marriage->bride_witness_country ?? 'NA'],
            ['Pin Code', $marriage->bride_witness_pincode ?? 'NA'],
            ['Contact', $marriage->bride_witness_contact ?? 'NA'],
            [],

            // 7. Groom Witness Details
            ['===== GROOM WITNESS DETAILS ====='],
            ['Field', 'Value'],
            ['Name', $marriage->groom_witness_name ?? 'NA'],
            ['Address', $marriage->groom_witness_address ?? 'NA'],
            ['District', $marriage->groom_witness_district ?? 'NA'],
            ['State', $marriage->groom_witness_state ?? 'NA'],
            ['Country', $marriage->groom_witness_country ?? 'NA'],
            ['Pin Code', $marriage->groom_witness_pincode ?? 'NA'],
            ['Contact', $marriage->groom_witness_contact ?? 'NA'],
        ];

        $filename = "marriage_record_{$marriageId}.csv";
        $file = fopen(public_path($filename), 'w');

        foreach ($csvData as $row) {
            fputcsv($file, $row);
        }

        fclose($file);

        return response()->download(public_path($filename));
    }

    public function exportWastageBill()
    {
        try {
            $wastageCollections = WastageCollection::orderBy('id', 'DESC')->get();

            $filename = "wastage_collection_report.csv";
            $handle = fopen($filename, 'w+');

            if ($handle === false) {
                throw new \Exception("Unable to open file for writing.");
            }

            fputcsv($handle, [
                'S.No.',
                'Emitra Code',
                'Mobile Number',
                'Email',
                'Status',
                'Payment Status'
            ]);

            foreach ($wastageCollections as $index => $trade) {
                fputcsv($handle, [
                    $index + 1,
                    $trade->code_12 ?? 'NA',
                    $trade->mobile ?? 'NA',
                    $trade->email ?? 'NA',
                    $trade->status == 0 ? 'Waiting' : ($trade->status == 1 ? 'Approve' : 'Reject'),
                    $trade->payment_status == 0 ? 'Due' : 'Paid'
                ]);
            }

            fclose($handle);

            $headers = [
                'Content-Type' => 'text/csv',
            ];

            return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error('Failed to export wastage collection data: ' . $e->getMessage());

            return response()->json([
                'error' => 'Failed to export wastage collection data. Please try again later.'
            ], 500);
        }
    }

    public function exportWastageViewBill($id)
    {
        try {
            $wastageCollection = WastageCollection::findOrFail($id);

            $filename = "wastage_collection_report_{$id}.csv";
            $handle = fopen($filename, 'w+');

            if ($handle === false) {
                throw new \Exception("Unable to open file for writing.");
            }

            fputcsv($handle, [
                'Field',
                'Details'
            ]);

            fputcsv($handle, ['Emitra Code', $wastageCollection->code_12 ?? 'NA']);
            fputcsv($handle, ['Mobile', $wastageCollection->mobile ?? 'NA']);
            fputcsv($handle, ['Email', $wastageCollection->email ?? 'NA']);

            fclose($handle);

            $headers = [
                'Content-Type' => 'text/csv',
            ];

            return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error("Failed to export wastage collection data for ID $id: " . $e->getMessage());

            return response()->json([
                'error' => 'Failed to export wastage collection data. Please try again later.'
            ], 500);
        }
    }

    public function exportWaterBill()
    {
        try {
            $waterTaxes = WaterTax::orderBy('id', 'desc')->get();

            $filename = "water_tax_report.csv";
            $handle = fopen($filename, 'w+');

            if ($handle === false) {
                throw new \Exception("Unable to open file for writing.");
            }

            fputcsv($handle, [
                'S.No.',
                'Emitra Code',
                'Mobile Number',
                'Email',
                'Status',
                'Payment Status'
            ]);

            foreach ($waterTaxes as $index => $tax) {
                fputcsv($handle, [
                    $index + 1,
                    $tax->emitra_12_code ?? 'NA',
                    $tax->mobile ?? 'NA',
                    $tax->email ?? 'NA',
                    $tax->status == 0 ? 'Waiting' : ($tax->status == 1 ? 'Approve' : 'Reject'),
                    $tax->payment_status == 0 ? 'Due' : 'Paid'
                ]);
            }

            fclose($handle);

            $headers = [
                'Content-Type' => 'text/csv',
            ];

            return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error('Failed to export water tax data: ' . $e->getMessage());

            return response()->json([
                'error' => 'Failed to export water tax data. Please try again later.'
            ], 500);
        }
    }

    public function exportWaterViewBill($id)
    {
        try {
            $waterTax = WaterTax::findOrFail($id);

            $filename = "water_tax_report_{$id}.csv";
            $handle = fopen($filename, 'w+');

            if ($handle === false) {
                throw new \Exception("Unable to open file for writing.");
            }

            fputcsv($handle, [
                'Field',
                'Details'
            ]);

            fputcsv($handle, ['Emitra Code', $waterTax->emitra_12_code ?? 'NA']);
            fputcsv($handle, ['Mobile', $waterTax->mobile ?? 'NA']);
            fputcsv($handle, ['Email', $waterTax->email ?? 'NA']);

            fclose($handle);

            $headers = [
                'Content-Type' => 'text/csv',
            ];

            return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error("Failed to export water tax data for ID $id: " . $e->getMessage());

            return response()->json([
                'error' => 'Failed to export water tax data. Please try again later.'
            ], 500);
        }
    }

    public function exportTradeBill()
    {
        try {
            $trades = TradeLicense::orderBy('id', 'desc')->get();

            $filename = "trade_license_report.csv";
            $handle = fopen($filename, 'w+');

            if ($handle === false) {
                throw new \Exception("Unable to open file for writing.");
            }

            fputcsv($handle, [
                'S.No.',
                'Date',
                'Application ID',
                'Applicant Name',
                'Application Status',
                'Payment Status'
            ]);

            foreach ($trades as $index => $trade) {
                fputcsv($handle, [
                    $index + 1,
                    isset($trade->created_at) ? $trade->created_at->format('d F Y') : 'NA',
                    $trade->id ?? 'NA',
                    $trade->name ?? 'NA',
                    $trade->check_status == 0 ? 'Waiting' : ($trade->check_status == 1 ? 'Approve' : 'Reject'),
                    $trade->payment_status == 0 ? 'Due' : 'Paid'
                ]);
            }

            fclose($handle);

            $headers = [
                'Content-Type' => 'text/csv',
            ];

            return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error('Failed to export trade license data: ' . $e->getMessage());

            return response()->json([
                'error' => 'Failed to export trade license data. Please try again later.'
            ], 500);
        }
    }

    public function exportTradeViewBill($id)
    {
        try {
            $trades = TradeLicense::where('id', $id)->firstOrFail();
            $tradeUnits = TradeLicenseUnit::where('trade_id', $id)->get();
            $tradeOwners = TradeLicenseOwner::where('trade_id', $id)->get();

            $filename = "trade_license_report_{$id}.csv";
            $handle = fopen($filename, 'w+');

            if ($handle === false) {
                throw new \Exception("Unable to open file for writing.");
            }

            fputcsv($handle, ['Field', 'Details']);

            fputcsv($handle, ['Name of Trade', $trades->name ?? 'NA']);
            fputcsv($handle, ['Trade Commencement Date', $trades->commencement_date ?? 'NA']);
            fputcsv($handle, ['Trade Period', $trades->trade_period ?? 'NA']);
            fputcsv($handle, ['Trade GST No.', $trades->trade_gst_no ?? 'NA']);
            fputcsv($handle, ['Trade Purpose', $trades->trade_purpose ?? 'NA']);
            fputcsv($handle, ['License Type', $trades->license_type ?? 'NA']);

            fputcsv($handle, ['===== ADDRESS DETAILS =====']);
            fputcsv($handle, ['City', $trades->city ?? 'NA']);
            fputcsv($handle, ['Door/House Number', $trades->door ?? 'NA']);
            fputcsv($handle, ['Building/Colony Name', $trades->colony_name ?? 'NA']);
            fputcsv($handle, ['Street Name', $trades->state_name ?? 'NA']);
            fputcsv($handle, ['Village', $trades->village ?? 'NA']);
            fputcsv($handle, ['Pin Code', $trades->pin_code ?? 'NA']);
            fputcsv($handle, ['Electricity Connection Number', $trades->collection_name ?? 'NA']);

            // Separate section for Ownership Details
            fputcsv($handle, ['===== OWNERSHIP DETAILS =====']);
            fputcsv($handle, ['Type of Ownership', $trades->type_of_ownership ?? 'NA']);
            fputcsv($handle, ['Type of Sub-Ownership', $trades->type_of_sub_ownership ?? 'NA']);

            // Separate section for Owner Details
            fputcsv($handle, ['===== OWNER DETAILS =====']);
            fputcsv($handle, ['S. NO', 'Mobile No.', 'Name', 'Father/Husband\'s Name', 'Relationship', 'Gender', 'Date of Birth', 'Email', 'PAN No', 'Address', 'Category']);
            foreach ($tradeOwners as $key => $tradeOwner) {
                fputcsv($handle, [
                    $key + 1,
                    $tradeOwner->mobile_no ?? 'NA',
                    $tradeOwner->name ?? 'NA',
                    $tradeOwner->father_name ?? 'NA',
                    $tradeOwner->relationship ?? 'NA',
                    $tradeOwner->gender ?? 'NA',
                    $tradeOwner->dob ?? 'NA',
                    $tradeOwner->email ?? 'NA',
                    $tradeOwner->pan_no ?? 'NA',
                    $tradeOwner->address ?? 'NA',
                    $tradeOwner->category ?? 'NA'
                ]);
            }

            // Separate section for Trade Unit Details
            fputcsv($handle, ['===== TRADE UNIT DETAILS =====']);
            fputcsv($handle, ['S. NO', 'Trade Type', 'Trade Sub Type', 'UOM', 'UOM Value']);
            foreach ($tradeUnits as $key => $tradeUnit) {
                fputcsv($handle, [
                    $key + 1,
                    $tradeUnit->trade_type ?? 'NA',
                    $tradeUnit->trade_subType ?? 'NA',
                    $tradeUnit->uom ?? 'NA',
                    $tradeUnit->uom_value ?? 'NA'
                ]);
            }

            // Separate section for Required Document Details
            fputcsv($handle, ['===== REQUIRED DOCUMENTS =====']);
            fputcsv($handle, ['Document Type', 'Details']);

            // Owners ID Proof
            fputcsv($handle, [
                'Owners ID Proof',
                $trades['ownership_id_proof'] ?? 'NA' . ' | ' .
                    (isset($trades['ownership_id_proof_img']) ?
                        '<a href="' . $trades['ownership_id_proof_img'] . '" target="_blank">View PDF →</a>' :
                        'No document available')
            ]);

            // Ownership Proof
            fputcsv($handle, [
                'Ownership Proof',
                $trades['ownership_proof'] ?? 'NA' . ' | ' .
                    (isset($trades['ownership_proof_img']) ?
                        '<a href="' . $trades['ownership_proof_img'] . '" target="_blank">View PDF →</a>' :
                        'No document available')
            ]);

            // Owners Photo
            fputcsv($handle, [
                'Owners Photo',
                $trades['ownership'] ?? 'NA' . ' | ' .
                    (isset($trades['ownership_photu']) ?
                        '<a href="' . $trades['ownership_photu'] . '" target="_blank">View PDF →</a>' :
                        'No document available')
            ]);

            fclose($handle);

            $headers = [
                'Content-Type' => 'text/csv',
            ];

            return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error("Failed to export trade license data for ID $id: " . $e->getMessage());

            return response()->json([
                'error' => 'Failed to export trade license data. Please try again later.'
            ], 500);
        }
    }

    public function exportPropertyViewBill($id)
    {
        try {
            $property = Property::findOrFail($id);

            $propertyValue = $property->property === "Residential"
                ? $property->res_monthly_rate ?? 0
                : $property->total_annual_value ?? 0;

            $deedCharge = match (true) {
                $propertyValue >= 1 && $propertyValue < 99999 => 1000,
                $propertyValue >= 100000 && $propertyValue <= 299999 => 2000,
                $propertyValue >= 300000 && $propertyValue <= 599999 => 3000,
                $propertyValue >= 600000 && $propertyValue <= 1499999 => 6000,
                default => 10000,
            };

            $filename = "property_view_bill_{$id}.csv";
            $handle = fopen($filename, 'w+');

            if ($handle === false) {
                throw new \Exception("Unable to open file for writing.");
            }

            fputcsv($handle, ['Field', 'Details']);

            if ($property->property === 'Residential') {
                fputcsv($handle, ['Details of Owner or Director', '']);
                fputcsv($handle, ['Name of Chairman or Owner', $property->name_chairman_owner ?? 'NA']);
                fputcsv($handle, ['Name of Father/Husband of Chairman/Owner', $property->name_fh_chairman_owner ?? 'NA']);
                fputcsv($handle, ['Building/House/Root Number and Location Address', $property->bhr_number_local_address ?? 'NA']);
                fputcsv($handle, ['Building/House Plot Owner / Residential Address of the Principal', $property->bhp_owner_res_address ?? 'NA']);
                fputcsv($handle, ['Any Other Details', $property->any_other_details ?? 'NA']);
                fputcsv($handle, ['Covered Area of Buildings (in square feet)', $property->buildings_area_covered ?? 'NA']);
                fputcsv($handle, ['Area of Open Land or Plot (in square feet)', $property->land_plot_area ?? 'NA']);
                fputcsv($handle, ['Other Details if Any', $property->other_details ?? 'NA']);
                fputcsv($handle, ['Internal Dimensions of All Rooms and Covered Verandahs (in square feet)', $property->res_internal_dimenssion_room ?? 'NA']);
                fputcsv($handle, ['Internal Dimensions of All Balconies, Corridors, Kitchens, and Store Rooms (in square feet)', $property->res_internal_dimenssion_balconies ?? 'NA']);
                fputcsv($handle, ['Internal Dimensions of All Garages (in square feet)', $property->res_internal_dimenssion_garages ?? 'NA']);
                fputcsv($handle, ['Floor Area of Building', $property->res_floor_area_building ?? 'NA']);
                fputcsv($handle, ['80% of the Area Covered (80% Calculation)', $property->res_area_covered ?? 'NA']);
                fputcsv($handle, ['On Road Width More Than 24 Metres', $property->more_24_meter ?? 'NA']);
                fputcsv($handle, ['On Road Width More Than 12 Metres or Less Than 24 Metres', $property->more_12_meter ?? 'NA']);
                fputcsv($handle, ['On Road Width More Than 9 Metres Less Than 12 Metres', $property->more_9_meter ?? 'NA']);
                fputcsv($handle, ['On Roads Up To 9 Metres Wide', $property->wide_9_meter ?? 'NA']);
                fputcsv($handle, ['Nature of Building Construction - R.C.C. Roof or R.B. Concrete Building', $property->res_building_roof ?? 'NA']);
                fputcsv($handle, ['Other Concrete Buildings', $property->res_concrete_building ?? 'NA']);
                fputcsv($handle, ['Kachha Building', $property->broken_building ?? 'NA']);
                fputcsv($handle, ['On Road Width More Than 24 Metres (Land)', $property->res_land_located ?? 'NA']);
                fputcsv($handle, ['On Road Width More Than 12 Metres or Less Than 24 Metres (Land)', $property->res_land_more_12_meter ?? 'NA']);
                fputcsv($handle, ['On Road Width More Than 9 Metres Less Than 12 Metres (Land)', $property->res_land_more_9_meter ?? 'NA']);
                fputcsv($handle, ['On Roads Up To 9 Metres Wide (Land)', $property->res_land_wide_9_meter ?? 'NA']);
                fputcsv($handle, ['Whether the Building is Owner-Occupied or On Rent', $property->res_building_owner_rent ?? 'NA']);
                fputcsv($handle, ['Year of Construction', $property->construction_year ?? 'NA']);
                fputcsv($handle, ['Minimum Monthly Rental Rate (per square foot)', $property->res_rate_square ?? 'NA']);
                fputcsv($handle, ['Minimum Monthly Rental Rate Fixed for the Building', $property->res_monthly_rate ?? 'NA']);
                fputcsv($handle, ['Total Amount', $propertyValue + $deedCharge]);
            } elseif ($property->property === 'Non Residential') {
                fputcsv($handle, ['Name of Chairman or Owner', $property->name_chairman_owner ?? 'NA']);
                fputcsv($handle, ['Name of Father/Husband of Chairman/Owner', $property->name_fh_chairman_owner ?? 'NA']);
                fputcsv($handle, ['Building/House/Root Number and Location Address', $property->bhr_number_local_address ?? 'NA']);
                fputcsv($handle, ['Building/House Plot Owner / Residential Address of the Principal', $property->bhp_owner_res_address ?? 'NA']);
                fputcsv($handle, ['Any Other Details', $property->any_other_details ?? 'NA']);
                fputcsv($handle, ['Covered Area of Buildings (in square feet)', $property->buildings_area_covered ?? 'NA']);
                fputcsv($handle, ['Area of Open Land or Plot (in square feet)', $property->land_plot_area ?? 'NA']);
                fputcsv($handle, ['Other Details if Any', $property->other_details ?? 'NA']);
                fputcsv($handle, ['On Road Width More Than 24 Metres', $property->more_24_meter ?? 'NA']);
                fputcsv($handle, ['On Road Width More Than 12 Metres or Less Than 24 Metres', $property->more_12_meter ?? 'NA']);
                fputcsv($handle, ['On Road Width More Than 9 Metres Less Than 12 Metres', $property->more_9_meter ?? 'NA']);
                fputcsv($handle, ['On Roads Up to 9 Metres Wide', $property->wide_9_meter ?? 'NA']);
                fputcsv($handle, ['Concrete House More than 24 Meters Wide', $property->corporate_house_24_meter ?? 'NA']);
                fputcsv($handle, ['Other Permanent Buildings, Atavest/Fibre or Tin Sheds', $property->other_premanent_buildings ?? 'NA']);
                fputcsv($handle, ['Kachha Building', $property->broken_building ?? 'NA']);
                fputcsv($handle, ['Year of Construction', $property->construction_year ?? 'NA']);
                fputcsv($handle, ['Predetermined Annual Value and Assessment Year', $property->predetermind_value_year ?? 'NA']);
                fputcsv($handle, ['Annual Value of the Building', $property->calc_annual_value_building ?? 'NA']);
                fputcsv($handle, ['Monthly Rental Rate for Residential Building', $property->rental_rate_residential_building ?? 'NA']);
                fputcsv($handle, ['Coefficient Related to Residential Building Rate', $property->coefficient_res_building_rate ?? 'NA']);
                fputcsv($handle, ['Monthly Rental Rate Received for the Building', $property->received_rental_rate_building ?? 'NA']);
                fputcsv($handle, ['Covered Area of Building', $property->covered_area_building ?? 'NA']);
                fputcsv($handle, ['Annual Value of the Building (Monthly Rental Rate x Covered Area x 12)', $property->annual_value_building ?? 'NA']);
                fputcsv($handle, ['Monthly Rental Rate for Residential Land', $property->residential_rate_land ?? 'NA']);
                fputcsv($handle, ['Coefficient Relating to the Rate of the Tax on Residential Land', $property->coefficient_land ?? 'NA']);
                fputcsv($handle, ['Monthly Rent Received for the Land', $property->rent_received_land ?? 'NA']);
                fputcsv($handle, ['Area of Land', $property->area_of_land ?? 'NA']);
                fputcsv($handle, ['Calculated Monthly Annual Value Building', $property->calc_month_annual_value_building ?? 'NA']);
                fputcsv($handle, ['Total Annual Value', $property->total_annual_value ?? 'NA']);
                fputcsv($handle, ['Total Amount', $propertyValue + $deedCharge]);
            }

            fclose($handle);

            $headers = [
                'Content-Type' => 'text/csv',
            ];

            return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error("Failed to export property view bill for ID $id: " . $e->getMessage());

            return response()->json([
                'error' => 'Failed to export property view bill. Please try again later.'
            ], 500);
        }
    }
}
