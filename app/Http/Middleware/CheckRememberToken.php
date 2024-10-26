<?php

namespace App\Http\Middleware;

use App\Models\UserLog;
use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CheckRememberToken
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $sessionToken = session('session_id');

            if ($sessionToken !== $user->session_id) {
                $log = UserLog::where('email', Auth::user()->email)->latest()->first();
                if ($log) {
                    $log->update(['logged_out_at' => Carbon::now()]);
                }

                Auth::logout();
                session()->forget('session_id');

                return redirect()->route('login.page')->with('error', 'You have been logged out due to logging in from another location.');
            }
        }

        return $next($request);
    }
}
