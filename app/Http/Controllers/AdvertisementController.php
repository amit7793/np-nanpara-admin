<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\ApplyAdvertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdvertisementController extends Controller
{
    public function homeAdvertisement()
    {
        return view('advertisement.main-page');
    }

    public function advertisementList()
    {
        try {
            $advertisement = Advertisement::all();
            return view('advertisement.advertisement', compact('advertisement'));
        } catch (\Exception $e) {
            Log::error('Error loading advertisement list: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Unable to load advertisement list. Please try again later.']);
        }
    }

    public function addAdvertisement()
    {
        try {
            return view('advertisement.add-advertisement');
        } catch (\Exception $e) {
            Log::error('Error loading add advertisement page: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Unable to load add advertisement page. Please try again later.']);
        }
    }

    public function storeAdvertisement(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric',
            'mobile_number' => 'required|numeric|digits:10',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'pincode' => 'required|numeric|digits:6',
        ]);

        try {
            if ($request->hasFile('image')) {
                $imagePath = fileUploadOnServer($request->file('image'), 'advertisements');
                $validatedData['image'] = $imagePath;
            }

            $advertisement = Advertisement::create([
                'image' => $validatedData['image'],
                'price' => $validatedData['price'],
                'mobile' => $validatedData['mobile_number'],
                'width' => $validatedData['width'],
                'height' => $validatedData['height'],
                'adderss' => $validatedData['address'],
                'city' => $validatedData['city'],
                'pincode' => $validatedData['pincode'],
                'status' => 1,
            ]);

            return redirect()->route('admin.advertisementList')->with('success', 'Advertisement successfully created.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'There was an issue with your submission.']);
        }
    }

    public function toggleAdvertisementStatus(Request $request)
    {
        $advertisement = Advertisement::find($request->id);
        if ($advertisement) {
            $advertisement->status = $request->status;
            $advertisement->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function applicationList()
    {
        $advertisements = ApplyAdvertisement::with('advertisement')
            ->orderBy('id', 'desc')
            ->get();
        return view('advertisement.application-list', compact('advertisements'));
    }

    public function applicationView($id)
    {
        $advertisements = ApplyAdvertisement::where('id', $id)
            ->with('advertisement')
            ->orderBy('id', 'desc')
            ->first();
        return view('advertisement.application-view', compact('advertisements'));
    }

    public function approveAdvertisement(Request $request)
    {
        $advertisement = ApplyAdvertisement::find($request->id);

        if ($advertisement) {
            do {
                $randomNumber = rand(100000, 999999);
                $chalanNumber = 'ADVE' . $randomNumber;
            } while (ApplyAdvertisement::where('chalan_number', $chalanNumber)->exists());

            $advertisement->status = 1;
            $advertisement->chalan_number = $chalanNumber;
            $advertisement->remark = null;
            $advertisement->save();

            $relatedAdvertisement = Advertisement::find($advertisement->advertisement_id);

            if ($relatedAdvertisement) {
                $relatedAdvertisement->booked = 1;
                $relatedAdvertisement->amount = $advertisement->user_price;
                $relatedAdvertisement->remaining = $advertisement->user_price;
                $relatedAdvertisement->save();
            }

            return response()->json([
                'success' => true,
                'chalan_number' => $chalanNumber,
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Advertisement not found.']);
    }


    public function rejectAdvertisement(Request $request)
    {
        $advertisement = ApplyAdvertisement::find($request->id);

        if ($advertisement) {
            $advertisement->status = 2;
            $advertisement->remark = $request->remark;
            $advertisement->chalan_number = null;
            $advertisement->save();

            return response()->json([
                'success' => true,
                'message' => 'Advertisement rejected successfully.',
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Advertisement not found.']);
    }
}
