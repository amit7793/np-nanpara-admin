<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Country;
use App\Models\Marriage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class MarriageController extends Controller
{

    public function marriageCertificateList()
    {
        try {

            $marriage = Marriage::OrderBy('id', "Desc")->get();
            return view('marriage.marriage-list', [
                'marriage' =>   $marriage,
            ]);
        } catch (\Exception $e) {
            Log::error('Error something want to wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function marriageCertificateView($id)
    {
        try {
            $marriage = Marriage::where('id', $id)->first();
            return view('marriage.marriage-view', [
                "marriage" => $marriage,
            ]);
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function marriageCertificatePdf($id)
    {
        $data  = Marriage::findOrFail($id);
        $marriage = ['marriage' => $data];
        $pdf = PDF::loadView('marriage.marriage-certificate', $marriage);
        return $pdf->download('marriage-certificate.pdf');
    }

    public function statusChange(Request $request)
    {
        $marriage = Marriage::find($request->id);
        if ($marriage) {
            $marriage->status = $request->status;
            if ($request->status == "1") {
                $chalan_number = 'MARRIAGE' . rand(1, 10);

                if (Marriage::where('chalan_number', $chalan_number)) {
                    $chalan_number = 'MARRIAGE' . rand(1, 100000);
                }
                $givenDate = Carbon::create($marriage->marriage_date);

                $currentDate = Carbon::now();
                $differenceInDays = $currentDate->diffInDays($givenDate);

                if ($differenceInDays < 21) {
                    $marriage->amount = "0";
                    $marriage->payment_status = "1";
                    $marriage->remaining = "1";
                } elseif ($differenceInDays <= 30) {
                    $marriage->amount = "2";
                    $marriage->remaining = "2";
                } elseif ($differenceInDays <= 365) {
                    $marriage->amount = "5";
                    $marriage->remaining = "5";
                } else {
                    $marriage->amount = "10";
                    $marriage->remaining = "10";
                }

                $notification = "Marriage Certificate Approved with Application ID is {$request->id} Where Payment Amount is 2₹";
                $marriage->chalan_number = $chalan_number;
                $marriage->approval_date = Carbon::now();
            } else {
                $notification = "Marriage Certificate Rejected with Application ID is {$request->id} Where Reason is {$request->remark}";
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

    public function UploadMarriageCertificateSlip(Request $request)
    {
        try {
            $paySlip = $request->pay_slip;
            $file = fileUploadOnServer($paySlip, 'pay_slip');
            $property = Marriage::where('id', $request->id)->update(['pay_slip' => $file, 'payment_status' => 1]);
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
