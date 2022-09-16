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
    
    public function showTable(Request $request): View
    {     
      
        $statistic=Statistic::all();

        
        if(request('search'))
        {
            $countryName = $request->input('search');
            $statistic = Statistic::query()
            ->where('country', 'LIKE', "%{$countryName}%")
            ->get();
        }
        
      return view('countries',['data'=>$statistic,'countries'=>Country::all()]);
    }
}
