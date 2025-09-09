<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Kalau role user tidak sesuai middleware
        if ($request->user()->role !== $role) {
            // Alihkan ke dashboard sesuai role sebenarnya
            switch ($request->user()->role) {
                case 'admin':
                    return redirect()->route('dashboard.dashboardAdmin');
                case 'super':
                    return redirect()->route('dashboard.dashboardSuper');
                default:
                    return redirect()->route('dashboard.dashboardUser');
            }
        }

        return $next($request);
    }
}