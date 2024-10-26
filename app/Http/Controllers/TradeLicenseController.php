<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\TradeLicense;
use Illuminate\Http\Request;
use App\Models\TradeCategory;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\TradeLicenseUnit;
use App\Models\TradeSubCategory;
use App\Models\TradeLicenseOwner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TradeLicenseController extends Controller
{
    public function tradeLicenseList()
    {
        try {

            $trades = TradeLicense::OrderBy('id', "Desc")->get();
            return view('tradelicense.trade-list', [
                'trades' =>   $trades,
            ]);
        } catch (\Exception $e) {
            Log::error('Error something want to wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function tradeLicenseView($id)
    {
        try {
            $trade = TradeLicense::where('id', $id)->first();
            $tradeUnits = TradeLicenseUnit::where('trade_id', $id)->get();
            // dd($tradeUnits);
            $tradeOwners = TradeLicenseOwner::where('trade_id', $id)->get();
            return view('tradelicense.trade-view', [
                "trades" => $trade,
                "tradeUnits" => $tradeUnits,
                "tradeOwners" => $tradeOwners,
                "tradeOwners" => $tradeOwners,

            ]);
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function tradeLicensePdf($id)
    {
        $data = TradeLicense::findOrFail($id);
        $tradeUnits = TradeLicenseUnit::where('trade_id', $id)->get();
        $tradeOwners = TradeLicenseOwner::where('trade_id', $id)->get();

        $trades = [
            'trade' => $data,
            'tradeUnits' => $tradeUnits,
            'tradeOwners' => $tradeOwners,
        ];

        $pdf = PDF::loadView('tradeLicense.trade-certificate', $trades);
        return $pdf->download('tradeLicense-certificate.pdf');
    }

    public function statusTradeChange(Request $request)
    {
        try {
            $trade = TradeLicense::find($request->id);
            if (!$trade) {
                return response()->json(['success' => false, 'message' => 'Trade not found.'], 404);
            }

            $trade_units = TradeLicenseUnit::where('trade_id', $trade->id)->get();
            if ($trade_units->isEmpty()) {
                return response()->json(['success' => false, 'message' => 'No trade units found for this trade.'], 404);
            }

            if ($request->status == "1") {
                $categories = TradeCategory::pluck('name')->toArray();
                $total_price = 0;

                foreach ($trade_units as $unit) {
                    $trade_type = $unit->trade_type;

                    if (!in_array($trade_type, $categories)) {
                        return response()->json([
                            'success' => false,
                            'message' => "Trade type '{$trade_type}' does not exist in categories."
                        ], 400);
                    }

                    $trade_subtype = $unit->trade_subType;
                    $trade_sub_category = TradeSubCategory::where('sub_category', $trade_subtype)->first();
                    if ($trade_sub_category) {
                        $total_price += $trade_sub_category->price;
                    }
                }

                $chalan_number = 'TRADE' . $this->generateUniqueChalanNumber();
                $trade->chalan_number = $chalan_number;
                $trade->amount = $total_price;
                $trade->remaining = $total_price;

                $notification = "Trade License Approved with Application ID {$request->id}. Payment Amount: ₹{$total_price}";
            } else {
                $notification = "Trade License Rejected with Application ID {$request->id}. Reason: {$request->remark}";
            }

            $trade->check_status = $request->status;
            $trade->remark = $request->remark;
            $trade->save();

            return response()->json(['success' => true, 'message' => 'Status changed successfully.']);
        } catch (\Exception $e) {
            Log::error('Error in statusTradeChange: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An error occurred. Please try again later.']);
        }
    }

    /**
     * Generate a unique chalan number
     *
     * @return string
     */
    private function generateUniqueChalanNumber()
    {
        do {
            $chalan_number = rand(1, 100000);
        } while (TradeLicense::where('chalan_number', 'TRADE' . $chalan_number)->exists());

        return $chalan_number;
    }

    public function tradeCategoryList()
    {
        try {

            $trades = TradeCategory::OrderBy('id', "Desc")->get();

            return view('tradecategory.list', [
                'trades' =>   $trades,
            ]);
        } catch (\Exception $e) {
            Log::error('Error something want to wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function tradeCategoryAdd()
    {
        try {
            return view('tradecategory.add');
        } catch (\Exception $e) {
            Log::error('Error something want to wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function tradeCategorySave(Request $request)
    {
        try {

            $data = [
                'name' => $request->name
            ];

            $trades = TradeCategory::create($data);
            return redirect()->route('trade.category.list')->with('success', 'Category add successfully');
        } catch (\Exception $e) {
            Log::error('Error something want to wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function tradeCategoryDelete(Request $request)
    {
        try {
            DB::beginTransaction();
            TradeSubCategory::where('category_id', $request->id)->delete();

            TradeCategory::findOrFail($request->id)->delete();
            DB::commit();

            return redirect()->route('trade.category.list')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting category: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while deleting the category. Please try again.');
        }
    }

    public function tradeSubCategoryList()
    {
        try {
            $trades = TradeSubCategory::OrderBy('id', "Desc")->with('categoryDetails')->get();
            return view('tradecategory.subcategory-list', [
                'trades' =>   $trades,
            ]);
        } catch (\Exception $e) {
            Log::error('Error something want to wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function tradeSubCategoryAdd()
    {
        try {
            $categories = TradeCategory::all();
            return view('tradecategory.add-subcategory', compact('categories'));
        } catch (\Exception $e) {
            Log::error('Error something want to wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function tradeSubCategorySave(Request $request)
    {
        try {
            $data = [
                'category_id' => $request->category,
                'sub_category' => $request->subcategory_name,
                'price' => $request->price,
            ];

            $trades = TradeSubCategory::create($data);

            return redirect()->route('trade.subcategory.list')->with('success', 'Sub Category add successfully');
        } catch (\Exception $e) {
            Log::error('Error something want to wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function tradeSubCategoryDelete($id)
    {
        try {
            TradeSubCategory::where('id', $id)->delete();
            return redirect()->back()->with('success', 'Data deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function UploadPropertyTaxSlip(Request $request)
    {
        try {
            $paySlip = $request->pay_slip;
            $file = fileUploadOnServer($paySlip, 'pay_slip');
            $property = TradeLicense::where('id', $request->id)->update(['pay_slip' => $file, 'payment_status' => 1]);
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

    public function tradeListing()
    {
        try {
            $trades = TradeSubCategory::OrderBy('id', "Desc")->with('categoryDetails')->get();
            return view('trade-listing.trade-listing', compact('trades'));
        } catch (\Exception $e) {
            Log::error('Error something want to wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function tradeListingEdit($id)
    {
        try {
            $data = TradeSubCategory::findOrFail($id);
            $categories = TradeCategory::all();

            return view('trade-listing.edit-sub', compact('categories', 'data'));
        } catch (\Exception $e) {
            Log::error('Error in tradeListingEdit: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function tradeListingStore(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'category' => 'required',
            'subcategory_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ], [
            'category.required' => 'The category field is required.',
            'subcategory_name.required' => 'The subcategory name is required.',
            'subcategory_name.max' => 'The subcategory name should not exceed 255 characters.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least 0.',
        ]);

        try {
            $tradeSubCategory = TradeSubCategory::findOrFail($id);

            $tradeSubCategory->update([
                'category_id' => $validatedData['category'],
                'sub_category' => $validatedData['subcategory_name'],
                'price' => $validatedData['price'],
            ]);

            return redirect()->route('trade.tradeListing')->with('success', 'Data updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating Data: ' . $e->getMessage());

            return back()->withErrors(['error' => 'An error occurred while updating the Data. Please try again later.']);
        }
    }

    public function tradeCategoryEdit($id)
    {
        try {
            $data = TradeCategory::findOrFail($id);

            return view('tradecategory.edit-category', compact('data'));
        } catch (\Exception $e) {
            Log::error('Error in category edit: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function tradeCategoryUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:51',
        ], [
            'name.required' => 'The name is required.',
            'name.max' => 'The name should not exceed 255 characters.',
        ]);

        try {
            $tradeCategory = TradeCategory::findOrFail($id);

            $tradeCategory->update([
                'name' => $validatedData['name'],
            ]);

            return redirect()->route('trade.category.list')->with('success', 'Trade Category updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating Data: ' . $e->getMessage());

            return back()->withErrors(['error' => 'An error occurred while updating the Data. Please try again later.']);
        }
    }
}
