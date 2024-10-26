<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\admin;
use App\Models\UserLog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use phpseclib3\Crypt\AES;

class UserController extends Controller
{

    public function showLoginForm()
    {
        $captcha = $this->generateCaptcha();

        session(['captcha' => $captcha]);

        return view('login', ['captcha' => $captcha]);
    }

    public function refreshCaptcha()
    {
        $captcha = $this->generateCaptcha();

        session(['captcha' => $captcha]);

        return response()->json(['captcha' => $captcha]);
    }

    private function generateCaptcha()
    {
        $letters = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3);
        $digits = substr(str_shuffle('0123456789'), 0, 3);

        $captcha = str_shuffle($letters . $digits);

        return $captcha;
    }

    public function decryptFunction($encryptedData, $ivHex)
    {
        $key = '1234567890123456';
        $decodedData = base64_decode($encryptedData);
        $iv = hex2bin($ivHex); // Convert hex IV back to binary
        $aes = new AES('cbc');
        $aes->setKey($key);
        $aes->setIV($iv);
        $decryptedData = $aes->decrypt($decodedData);
        return $decryptedData;
    }

    public function login(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'encrypt_email' => 'required',
                'encrypt_password' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if ($request->captcha_input !== session('captcha')) {
                return redirect()->back()->with('error', 'Captcha is incorrect.');
            }

            $formData = $request->all();
            $encryptedDataiv = $request->encrypt_data_iv;
            $encrypt_email = $request->encrypt_email;
            $encrypt_password = $request->encrypt_password;
            $email    = $this->decryptFunction($encrypt_email, $encryptedDataiv);
            $password = $this->decryptFunction($encrypt_password, $encryptedDataiv);

            $Role = User::where('email', $email)->where('role', '1')->first();

            if ($Role) {
                    Auth::login($Role);
                    $newToken = Str::random(60);
                    Auth::user()->forceFill([
                        'session_id' => $newToken,
                    ])->save();

                    session(['session_id' => $newToken]);

                    UserLog::create([
                        'name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                        'phone_number' => Auth::user()->mobile,
                        'logged_in_at' => Carbon::now()
                    ]);

                    session()->forget('captcha');
                    return redirect()->route('admin.dashboard')->with('success', 'Admin successfully logged in');

            } else {
                return redirect()->route('login.page')->with('error', 'These credentials do not match our records.');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function dashboard()
    {
        try {
            return view('dashboard');
        } catch (\Exception $e) {
            Log::error('Error Somthing went to wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function logout(Request $request)
    {
        try {
            $log = UserLog::where('email', Auth::user()->email)->latest()->first();
            if ($log) {
                $log->update(['logged_out_at' => Carbon::now()]);
            }

            Auth::logout();
            return redirect('/')->with('success', 'You have been logged out successfully.');
        } catch (\Exception $e) {
            Log::error('Something went wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function userList()
    {
        try {

            $user = User::OrderBy('id', "Desc")->get();
            return view('user.user-list', compact('user'));
        } catch (\Exception $e) {
            Log::error('Error something want to wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function userView($id)
    {
        try {
            $user = User::where('id', $id)->first();;
            return view('user.user-view', compact('user'));
        } catch (\Exception $e) {
            Log::error('Error something went to wrong:' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function statusUserChange(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->status = $request->status;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Status changed successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Trade not found.'], 404);
    }

    public function profileDetails()
    {
        try {
            $user_id = Auth::user()->id;
            $user_data = User::where('id', $user_id)->first();

            return view('user.profile-details', [
                "user_data" => $user_data,
            ]);
        } catch (\Exception $e) {
            Log::error('Error Somthing went to wrong: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'current_password' => 'nullable|required_with:password',
            'password' => 'nullable|min:8',
        ]);

        try {
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                if (!Hash::check($request->current_password, $user->password)) {
                    return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
                }

                $user->password = Hash::make($request->password);
            }

            if ($request->hasFile('profile_image')) {
                $user->profile_image = fileUploadOnServer($request->file('profile_image'), 'profile_image');
            }

            $user->save();

            return redirect()->route('profile.details')->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            Log::error('Error in UserController@profileUpdate: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function logoutInactive(Request $request)
    {
        $log = UserLog::where('email', Auth::user()->email)->latest()->first();
        if ($log) {
            $log->update(['logged_out_at' => Carbon::now()]);
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.page')->with(['error' => 'You have been logged out due to inactivity.',]);
    }
}
