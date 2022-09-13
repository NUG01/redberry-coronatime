<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SetLocaleLanguage
{
   
    public function handle(Request $request, Closure $next)
    {
        $lang=session('lang','en');
        app()->setLocale($lang);

        return $next($request);
    }
}
