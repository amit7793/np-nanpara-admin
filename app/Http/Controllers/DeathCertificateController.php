<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Notification;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DeathCertificate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Services\deathcertificateservice;

class DeathCertificateController extends Controller
{
    //

    protected $deathcertificateservice;

    public function __construct(deathcertificateservice $deathcertificateservice)
    {
        $this->deathcertificateservice = $deathcertificateservice;
    }

    public function deathCertificateList()
    {
        try {
            $deathcertificate = DeathCertificate::OrderBy('id', 'DESC')->get();
            return view('DeathCertificate.deathcertificate-list', [
                "deathcertificate" => $deathcertificate,
            ]);
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function deathCertificateView($id)
    {
        try {

            $deathcertificate = deathCertificate::where('id', $id)->first();

            return view('DeathCertificate.deathcertificate-view', [
                "deathcertificate" => $deathcertificate,
            ]);
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function deathCertificatePdf($id)
    {
        try {
            $user_id = Auth::user()->id;
            $deathcertificate = deathCertificate::where('id', $id)->where('user_id',$user_id)->first();
            $deathcertificate = ['deathcertificate' => $deathcertificate];
            $options = array(
                        'margin-left'   => '10px',
                      'dpi'=> '115',
                      'header-font-size' => '14',
                );
            $pdf = PDF::loadView('PDF.deathcertificate', $deathcertificate)
                      ->setPaper('a4', 'portrait')// Set paper size to A4
                      ->setOption($options)
                      ->setPaper('Letter');
            return $pdf->download('death-certificate.pdf');
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function statusDeathChange(Request $request)
    {
        $death = deathCertificate::find($request->id);
        if ($death) {
            $death->status = $request->status;
            if($request->status == "1")
            {
                $chalan_number = 'DEATH' . rand(1, 10);

                if (deathCertificate::where('chalan_number', $chalan_number)) {
                    $chalan_number = 'DEATH' . rand(1, 100000);
                }

                $givenDate = Carbon::create($death->date_of_death);

                    // Current date and time
                    $currentDate = Carbon::now();
                    // dd($currentDate);
                    // Calculate the difference in days
                    $differenceInDays = $currentDate->diffInDays($givenDate);
                    if($differenceInDays < 21)
                    {
                        $death->amount = "0";
                        $death->payment_status = "1";
                        $death->remaining = "0";
                    }
                    // Logic to determine the message
                    elseif ($differenceInDays <= 30) {
                        $death->amount = "2";
                        $death->remaining = "2";
                    } elseif ($differenceInDays <= 365) {
                        $death->amount = "5";
                        $death->remaining = "5";
                    } else {
                        $death->amount = "10";
                        $death->remaining = "10";
                    }
                $notification = "Death Certificate Approved with Application ID is {$request->id} Where Payment Amount is 2₹";
                $death->chalan_number = $chalan_number;
                $death->approval_date = Carbon::now();
            }
            else
            {
                $notification = "Death Certificate Rejected with Application ID is {$request->id} Where Reason is {$request->remark}";
            }

            $death->remark = $request->remark;
            $death->save();
            if($death)
              {
                $data = [
                    'send' => 8,
                    'notification' => $notification,
                    'received' => $death->user_id,
                    'mark_as_read' => '0'
                ];

                Notification::create($data);

              }
            return response()->json(['success' => true, 'message' => 'Status changed successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Marriage not found.'], 404);
    }

    public function UploadDeathCertificateSlip(Request $request)
    {
        try {
            // dd($request->all());
            $paySlip = $request->pay_slip;
            $file = fileUploadOnServer($paySlip, 'pay_slip');
            $property = deathCertificate::where('id', $request->id)->update(['pay_slip' => $file, 'payment_status' => 1]);
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
