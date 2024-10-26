<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Notification;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\BirthCertificate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Services\birthcertificateservice;


class BirthCertificateController extends Controller
{
    //
    protected $birthcertificateservice;

    public function __construct(birthcertificateservice $birthcertificateservice)
    {
        $this->birthcertificateservice = $birthcertificateservice;
    }

    public function birthCertificate()
    {
        try {
            $birthcertificate = BirthCertificate::OrderBy('id', 'DESC')->get();
            return view('BirthCertificate.birthCertificate', compact('birthcertificate')); // Replace with your actual view name
        } catch (\Exception $e) {
            Log::error('Error something want to wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function birthCertificateStatus(Request $request)
    {
        $birth_id = $request->id;
        $Birth = BirthCertificate::find($request->id);
        if ($Birth) {
            $Birth->status = $request->status;
            if($request->status == "1")
            {
                $chalan_number = 'BIRTH' . rand(1, 10);

                if (BirthCertificate::where('chalan_number', $chalan_number)) {
                    $chalan_number = 'BIRTH' . rand(1, 100000);
                }
                 // Given date
                 $givenDate = Carbon::create($Birth->date_of_birth);

                 $currentDate = Carbon::now();
                 $differenceInDays = $currentDate->diffInDays($givenDate);
                if($differenceInDays <= 21)
                {
                    $Birth->amount = '0';
                    $Birth->payment_status = '1';
                    $Birth->remaining = '0';
                }
                 elseif ($differenceInDays <= 30) {
                     $Birth->amount = "2";
                     $Birth->remaining = '2';

                 } elseif ($differenceInDays <= 365) {
                     $Birth->amount = "5";
                     $Birth->remaining = '5';
                 } else {
                     $Birth->amount = "10";
                     $Birth->remaining = '10';
                 }
                $Birth->chalan_number = $chalan_number;
                $notification = "Birth Certificate Approved with Application ID is {$birth_id} Where Payment Amount is 2₹";
                $Birth->approval_date = Carbon::now();
            }
            else
            {
                $notification = "Birth Certificate Rejected with Application ID is {$birth_id} Where Reason is {$request->remark}";
            }
            $Birth->remark = $request->remark;
            $Birth->save();
            if($Birth)
              {
                $data = [
                    'send' => 8,
                    'notification' => $notification,
                    'received' => $Birth->user_id,
                    'mark_as_read' => '0'
                ];

                Notification::create($data);

              }
            return response()->json(['success' => true, 'message' => 'Status changed successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Birth data not found.'], 404);
    }

    public function birthCertificateList()
    {
        try {
            $user_id = Auth::guard('admin')->user()->id;
            $birthcertificate = BirthCertificate::OrderBy('id', 'DESC')->where('user_id', $user_id)->get();
            return view('BirthCertificate.birthCertificate-list', [
                "birthcertificate" => $birthcertificate,
            ]);
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function birthCertificateView($id)
    {
        try {
            $birthcertificate = BirthCertificate::where('id', $id)->first();
            return view('BirthCertificate.birthcertificate-list', [
                "birthcertificate" => $birthcertificate,
            ]);
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function birthCertificatePdf(Request $request)
    {
        try {
            $id = $request->id;
            $user_id = Auth::user()->id;
            $birthcertificate = BirthCertificate::where('id', $id)->where('user_id', $user_id)->first();
            $options = array(
                'margin-left'   => '10px',
                'dpi' => '115',
                'header-font-size' => '14',
                'defaultFont' => 'Noto Sans Devanagari',
                'isRemoteEnabled', true
            );
            

            $birthcertificate = ['birthcertificate' => $birthcertificate];
            $pdf = PDF::loadView('PDF.birthcertificate', $birthcertificate)
                ->setPaper('a4', 'portrait')
                ->setOption($options)
                ->setPaper('Letter');
            return $pdf->download('birth-certificate.pdf');
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function UploadBirthCertificateSlip(Request $request)
    {
        try {
            // dd($request->all());
            $paySlip = $request->pay_slip;
            $file = fileUploadOnServer($paySlip, 'pay_slip');
            $property = BirthCertificate::where('id', $request->id)->update(['pay_slip' => $file, 'payment_status' => 1]);
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
