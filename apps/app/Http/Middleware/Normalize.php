<?php

namespace App\Http\Middleware;

use Closure;

class Normalize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url = $_SERVER['REQUEST_URI']; // PHP 標準のリクエストを使用
        $normalized = normalize($url);
        if ($url != $normalized) {
            header('Location: ' . $normalized, true, 301);  // PHP 標準のリダイレクトを使用
            exit;
        }

        return $next($request);
    }
}
