<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function locale(string $locale): RedirectResponse
   {
        if(in_array($locale, config('app.available_locales'))){
        
            session()->put('lang',$locale);
        }else
        {
            session()->put('lang','en');

        }
        return redirect()->back();
   }
}
