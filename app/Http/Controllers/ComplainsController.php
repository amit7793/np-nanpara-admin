<?php

namespace App\Http\Controllers;
use App\Models\Notification;

use App\Models\Complains;
use Illuminate\Http\Request;
use App\Models\ComplainMessage;
use App\Services\complainservice;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class ComplainsController extends Controller
{
    //
    protected $complainservice;

    public function __construct(complainservice $complainservice)
    {
        $this->complainservice = $complainservice;
    }
    public function complains()
    {
        try {
            $complains = Complains::OrderBy('id', 'DESC')->get();
            return view('Complains.complains', compact('complains'));
        } catch (\Exception $e) {
            Log::error('Error something want to wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    // public function complainsView($id)
    // {
    //     // try {
    //     //     $complains = Complains::where('id', $id)->OrderBy('id', 'DESC')->first();
    //     //     return view('Complains.complains-view', compact('complains'));
    //     // } catch (Exception $e) {
    //     //     \Log::error('Error something want to wrong: ' . $e->getMessage());
    //     //     return redirect()->back()->with('error', 'An error occurred. Please try again.');
    //     // }
    //     try {
    //         $user_id = Auth::guard('admin')->user()->id;
    //         $complains = Complains::where('id', $id)->where('user_id', $user_id)->first();
    //         $complains_messages = ComplainMessage::where('complain_id', $id)->where('user_id', $user_id)->get();
    //         return view('Complains.complains-view', [
    //             "complains" => $complains,
    //             "complains_messages" => $complains_messages
    //         ]);
    //     } catch (\Exception $e) {
    //         \Log::error('Error something went to wrong:' . $e->getMessage());
    //         return redirect()->back()->with('error', 'An error occurred. Please try again.');
    //     }
    // }

    public function Complainsmessages(Request $request)
    {
        try {
            $user_id = Auth::user()->id;
            $complain = $this->complainservice->Complainsmessage($request, $user_id);

            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function complainsStatus(Request $request)
    {
        $complains = Complains::find($request->id);
        if ($complains) {
            $complains->status = $request->status;
            $complains->remark = $request->remark; // Add this line if you have a remark column
            $complains->save();

            return response()->json(['success' => true, 'message' => 'Status changed successfully.']);
        }
        return response()->json(['success' => false, 'message' => 'complains data not found.'], 404);
    }

    public function Complainschat($id)
    {
        try {
            $user_id = Auth::user()->id;
            $complains = Complains::where('id', $id)->first();
            $complains_messages = ComplainMessage::where('complain_id', $id)->get();
            return view('Complains.complains-chat', [
                "complains" => $complains,
                "complains_messages" => $complains_messages
            ]);
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }
}
