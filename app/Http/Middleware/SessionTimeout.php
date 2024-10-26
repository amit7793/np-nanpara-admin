<?php

namespace App\Http\Middleware;

use App\Models\UserLog;
use Closure;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class SessionTimeout
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = session('lastActivityTime');
            $timeout = config('session.lifetime') * 60;

            if ($lastActivity && (time() - $lastActivity > $timeout)) {
                $log = UserLog::where('email', Auth::user()->email)->latest()->first();
                if ($log) {
                    $log->update(['logged_out_at' => Carbon::now()]);
                }

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login.page')->with(['error' => 'Your session has expired.']);
            }

            session(['lastActivityTime' => time()]);
        }

        return $next($request);
    }
}
