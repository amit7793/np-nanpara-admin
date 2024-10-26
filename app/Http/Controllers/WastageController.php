<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WastageCollection;
use Illuminate\Support\Facades\Log;

class WastageController extends Controller
{
    public function wastageCollection()
    {
        try {
            $data = WastageCollection::orderBy('id', 'desc')->get();
            return view('wastage-collection.wastage-collection', compact('data'));
        } catch (\Exception $e) {
            Log::error('Error in wastageCollection: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load wastage collections. Please try again.');
        }
    }

    public function WastageView($id)
    {
        try {
            $data = WastageCollection::find($id);

            if (!$data) {
                return redirect()->back()->with('error', 'Wastage collection not found. Please try again.');
            }

            return view('wastage-collection.view-wastage', compact('data'));
        } catch (\Exception $e) {
            Log::error("Error in WastageView (ID: $id): " . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load the wastage collection details. Please try again.');
        }
    }

    public function wastageStatus(Request $request)
    {
        try {
            $trade = WastageCollection::find($request->id);

            if ($trade) {
                $trade->status = $request->status;
                $trade->amount = 101;
                $trade->remaining = 101;

                if ($request->status == "2") {
                    $trade->remark = $request->remark;
                } else {
                    $trade->remark = null;
                }

                $trade->save();

                return response()->json(['success' => true, 'message' => 'Status changed successfully.']);
            }

            return response()->json(['success' => false, 'message' => 'Trade not found.'], 404);
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An error occurred. Please try again.']);
        }
    }
}
