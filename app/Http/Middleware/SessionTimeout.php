<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class SessionTimeout
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $timeout = 300; // 5 menit = 300 detik

            $lastActivity = Session::get('lastActivityTime');
            $now = Carbon::now()->timestamp;

            if ($lastActivity && ($now - $lastActivity > $timeout)) {
                Auth::logout();
                Session::flush();
                return redirect()->route('login')->withErrors(['message' => 'Sesi berakhir karena tidak ada aktivitas.']);
            }

            Session::put('lastActivityTime', $now);
        }

        return $next($request);
    }
}
