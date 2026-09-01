<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Checkrole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Role Penulis: Hanya diizinkan mengakses Dashboard, Berita (News), Profil Akun, dan Logout
        if ($user->roles === 'penulis') {
            $allowedPatterns = ['dashboard', 'news.*', 'profil.*', 'logout'];
            $isAllowed = false;

            foreach ($allowedPatterns as $pattern) {
                if ($request->routeIs($pattern)) {
                    $isAllowed = true;
                    break;
                }
            }

            if (!$isAllowed) {
                return redirect()->route('news.index')->with('error', 'Akses dibatasi. Akun Anda hanya memiliki izin untuk mengelola Berita & Artikel.');
            }
        }

        return $next($request);
    }
}
