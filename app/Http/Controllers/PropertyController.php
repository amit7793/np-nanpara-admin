<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Notification;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\PropertyExport;
use App\Services\propertyservice;
use App\Models\PropertyPermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;


class PropertyController extends Controller
{

    protected $propertyservice;

    public function __construct(propertyservice $propertyservice)
    {
        $this->propertyservice = $propertyservice;
    }

    public function myPropertyList(Request $request)
    {
        try {
            $property = Property::orderBy('id', 'DESC')->get();
            return view('property.property-verification-list', [
                "property" => $property,
            ]);
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function Property($id)
    {
        try {
            $property = Property::where('id', $id)->first();
            $deedCharge = 0;
            $fixChargeType = 1;  // 1 = renaming, 2 = reconstruction, 3 = reconstruction on roof
            $fixCharge = 0;
            if ($property->property == "Residential") {
                $propertyValue = $property->res_monthly_rate ?? 0;
            } else {
                $propertyValue = $property->total_annual_value ?? 0;
            }
            // if ($fixChargeType === 1) {
            //     $fixCharge = 50000;
            // } elseif ($fixChargeType === 2) {
            //     $fixCharge = 25000;
            // } elseif ($fixChargeType === 3) {
            //     $fixCharge = 50000;
            // }

            if ($propertyValue >= 1 && $propertyValue < 99999) {
                $deedCharge = 1000;
            } elseif ($propertyValue >= 100000 && $propertyValue <= 299999) {
                $deedCharge = 2000;
            } elseif ($propertyValue >= 300000 && $propertyValue <= 599999) {
                $deedCharge = 3000;
            } elseif ($propertyValue >= 600000 && $propertyValue <= 1499999) {
                $deedCharge = 6000;
            } else {
                $deedCharge = 10000;
            }

            $charges['PropertyValue'] = $propertyValue;
            // $charges['fixCharges'] = $fixCharge;
            $charges['deedCharge'] = $deedCharge;
            $charges['TotalAmount'] = $propertyValue + $deedCharge;
            $view = $property->property === 'Non Residential'
                ? 'property.my-property-nonresidential-view'
                : 'property.my-property-residential-view';

            return view($view, [
                "property" => $property,
                "charges" => $charges
            ]);
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function UploadPropertyTaxSlip(Request $request)
    {
        try {
            $paySlip = $request->pay_slip;
            $file = fileUploadOnServer($paySlip, 'pay_slip');
            $property = Property::where('id', $request->id)->update(['pay_slip' => $file, 'payment_status' => 1]);
            if ($property) {
                return redirect()->back()->with('success', 'Pay slip uploaded successfully');
            } else {
                return redirect()->back()->with('error', 'Pay slip not uploaded, Try again');
            }
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function PropertyStatus(Request $request)
    {
        $marriage = Property::find($request->id);

        $chalan_number = 'PROP' . rand(1, 10);

        if (Property::where('chalan_number', $chalan_number)) {
            $chalan_number = 'PROP' . rand(1, 100000);
        }

        if ($marriage) {
            $marriage->status = $request->status;
            if ($request->status == "1") {
                $chalan_number = 'PROP' . rand(1, 10);

                if (Property::where('chalan_number', $chalan_number)) {
                    $chalan_number = 'PROP' . rand(1, 100000);
                }
                $notification = "Property Tax Approved with Application ID id {$request->id} Where Payment Amount is {$request->charges}₹";
                $marriage->amount = $request->charges;
                $marriage->remaining = intval($request->charges);
                $marriage->chalan_number = $chalan_number;
            } else {
                $notification = "Property Tax Rejected with Application ID is {$request->id} Where Reason is {$request->remark}";
            }
            $marriage->remark = $request->remark;
            $marriage->save();
            if ($marriage) {
                $data = [
                    'send' => 8,
                    'notification' => $notification,
                    'received' => $marriage->user_id,
                    'mark_as_read' => '0'
                ];

                Notification::create($data);
            }
            return response()->json(['success' => true, 'message' => 'Status changed successfully.']);
        }
        return response()->json(['success' => false, 'message' => 'Marriage not found.'], 404);
    }

    public function myPropertyPermissionList(Request $request)
    {
        try {
            $property = PropertyPermission::orderBy('id', 'DESC')->get();
            return view('property_permission.property-verification-list', [
                "property" => $property,
            ]);
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function PropertyPermission($id)
    {
        try {

            //fix charges ---->>  renaming = 50000, reconstruction = 25000, reconstruction on roof = 50000

            $property = PropertyPermission::where('id', $id)->first();
            $deedCharge = 0;
            $fixChargeType = 1;  // 1 = renaming, 2 = reconstruction, 3 = reconstruction on roof
            $fixCharge = 0;
            if ($property->property == "Residential") {
                $propertyValue = $property->res_monthly_rate ?? 0;
            } else {
                $propertyValue = $property->total_annual_value ?? 0;
            }

            if ($property->action_type === "Transfer") {
                $fixCharge = 50000;
            } elseif ($property->action_type === "Reconstruction") {
                $fixCharge = 25000;
            } else {
                $fixCharge = 50000;
            }

            if ($propertyValue >= 1 && $propertyValue < 99999) {
                $deedCharge = 1000;
            } elseif ($propertyValue >= 100000 && $propertyValue <= 299999) {
                $deedCharge = 2000;
            } elseif ($propertyValue >= 300000 && $propertyValue <= 599999) {
                $deedCharge = 3000;
            } elseif ($propertyValue >= 600000 && $propertyValue <= 1499999) {
                $deedCharge = 6000;
            } else {
                $deedCharge = 10000;
            }

            $charges['PropertyValue'] = $propertyValue;
            $charges['fixCharges'] = $fixCharge;
            $charges['deedCharge'] = $deedCharge;
            $charges['TotalAmount'] = $propertyValue + $fixCharge + $deedCharge;

            $view = $property->property === 'Non Residential'
                ? 'property_permission.my-property-nonresidential-view'
                : 'property_permission.my-property-residential-view';

            return view($view, [
                "property" => $property,
                "charges" => $charges
            ]);
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function PropertyPermissionStatus(Request $request)
    {
        $marriage = PropertyPermission::find($request->id);



        if ($marriage) {
            $marriage->status = $request->status;
            if ($request->status == "1") {
                $chalan_number = 'PROP' . rand(1, 10);

                if (PropertyPermission::where('chalan_number', $chalan_number)) {
                    $chalan_number = 'PROP' . rand(1, 100000);
                }
                $notification = "Property Permission Approved with Application ID is {$request->id} Where Payment Amount is {$request->charges}₹";
                $marriage->chalan_number = $chalan_number;
            } else {
                $notification = "Property Permission Rejected with Application ID is {$request->id} Where Reason is {$request->remark}";
            }
            $marriage->remark = $request->remark;
            $marriage->amount = $request->charges;
            $marriage->save();
            if ($marriage) {
                $data = [
                    'send' => 8,
                    'notification' => $notification,
                    'received' => $marriage->user_id,
                    'mark_as_read' => '0'
                ];

                Notification::create($data);
            }
            return response()->json(['success' => true, 'message' => 'Status changed successfully.']);
        }
        return response()->json(['success' => false, 'message' => 'Marriage not found.'], 404);
    }

    public function UploadPropertyPermissionTaxSlip(Request $request)
    {
        try {
            $paySlip = $request->pay_slip;
            $file = fileUploadOnServer($paySlip, 'pay_slip');
            $property = PropertyPermission::where('id', $request->id)->update(['pay_slip' => $file, 'payment_status' => 1]);
            if ($property) {
                return redirect()->back()->with('success', 'Pay slip uploaded successfully');
            } else {
                return redirect()->back()->with('error', 'Pay slip not uploaded, Try again');
            }
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }
}
