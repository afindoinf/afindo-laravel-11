<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CekAksesUser
{
    public function handle(Request $request, Closure $next)
    {
        $aksesUser = session()->get('akses_user');
        if (!$aksesUser) {
            return response()->json([
                'success' => false,
                'message' => 'Session tidak ditemukan atau expired'
            ], 403);
        }

        $currentUrl = $request->path();

        $hasAccess = $aksesUser->contains(function ($akses) use ($currentUrl) {
            if ($akses->Slug === $currentUrl) {
                return true;
            }

            $pattern = '/^' . preg_quote($akses->Slug, '/') . '\/.*$/';
            return preg_match($pattern, $currentUrl);
        });

        if (!$hasAccess) {
            Log::info('Access denied for URL: ' . $currentUrl);
            Log::info('Available routes: ', $aksesUser->pluck('Slug')->toArray());

            abort(403);
        }

        return $next($request);
    }
}
