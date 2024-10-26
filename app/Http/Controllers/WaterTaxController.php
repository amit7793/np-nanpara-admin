<?php

namespace App\Http\Controllers;

use App\Models\WaterTax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WaterTaxController extends Controller
{
    public function waterTax()
    {
        try {
            $data = WaterTax::orderBy('id', 'desc')->get();
            return view('water-tax.water-tax', compact('data'));
        } catch (\Exception $e) {
            Log::error('Error in waterTax: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load water taxes. Please try again.');
        }
    }

    public function waterView($id)
    {
        try {
            $data = WaterTax::find($id);

            if (!$data) {
                return redirect()->back()->with('error', 'Water tax record not found. Please try again.');
            }

            return view('water-tax.water-view', compact('data'));
        } catch (\Exception $e) {
            Log::error("Error in waterView (ID: $id): " . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load the water tax details. Please try again.');
        }
    }

    public function waterStatus(Request $request)
    {
        try {
            $trade = WaterTax::find($request->id);

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
