<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Contracts\View\View;

class StatisticController extends Controller
{
	public function show(): View
	{
		return view('worldwide', ['data'=> Statistic::all(),
			'sumConfirmed'                 => Statistic::sum('confirmed'),
			'sumRecovered'                 => Statistic::sum('recovered'),
			'sumDeaths'                    => Statistic::sum('deaths'),
		]);
	}

	public function showTable(): View
	{
		return view('countries', ['statistic'=>Statistic::filter()->get()]);
	}
}
