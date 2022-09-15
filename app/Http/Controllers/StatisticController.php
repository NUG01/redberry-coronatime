<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Statistic;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function show(): View
    {
        return view('worldwide',['data'=>Statistic::all(), 
        'sumConfirmed'=>number_format(Statistic::sum('confirmed')),
        'sumRecovered'=>number_format(Statistic::sum('recovered')),
        'sumDeaths'=>number_format(Statistic::sum('deaths')),
         
    ]);
    }
    
    public function showTable(): View
    {
        return view('countries',['data'=>Statistic::all(),'countries'=>Country::all()]);
    }
}
