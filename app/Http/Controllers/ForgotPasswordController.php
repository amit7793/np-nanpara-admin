<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        // dd('Badmosi ne mitr !');
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with(['error' => 'The email address does not exist in our records.']);
        }

        // if ($user->role !== '1') {
        //     return back()->with(['error' => 'You are not authorized to reset the password.']);
        // }

        $token = Str::random(60);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $resetLink = route('custom.password.reset', $token);
        Mail::send('auth.emails.password-reset', ['resetLink' => $resetLink], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Password Reset Request');
        });

        return back()->with('success', 'Password reset link sent to your email.');
    }

    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
            'token' => 'required'
        ]);

        $passwordReset = DB::table('password_resets')->where('token', $request->token)->first();

        if (!$passwordReset) {
            return back()->with(['error' => 'Invalid or expired reset token.']);
        }

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user) {
            return back()->withErrors(['error' => 'We could not find a user with that email address.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_resets')->where('email', $passwordReset->email)->delete();

        return redirect()->route('login.page')->with('success', 'Password has been reset successfully!');
    }
}
