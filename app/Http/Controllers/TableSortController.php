<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TableSortController extends Controller
{
	public function sort($slug, Request $request): View
	{
		$url = getenv('APP_URL');
		$statistic = Statistic::all();

		if (url()->current() == $url . '/countries/location-ascend')
		{
			$statistic = $statistic->sortBy('country')->values();
		}
		if (url()->current() == $url . '/countries/location-descend')
		{
			$statistic = $statistic->sortByDesc('country')->values();
		}

		if (url()->current() == $url . '/countries/new-cases-ascend')
		{
			$statistic = $statistic->sortBy('confirmed')->values();
		}
		if (url()->current() == $url . '/countries/new-cases-descend')
		{
			$statistic = $statistic->sortByDesc('confirmed')->values();
		}

		if (url()->current() == $url . '/countries/deaths-ascend')
		{
			$statistic = $statistic->sortBy('deaths')->values();
		}
		if (url()->current() == $url . '/countries/deaths-descend')
		{
			$statistic = $statistic->sortByDesc('deaths')->values();
		}

		if (url()->current() == $url . '/countries/recovered-ascend')
		{
			$statistic = $statistic->sortBy('recovered')->values();
		}
		if (url()->current() == $url . '/countries/recovered-descend')
		{
			$statistic = $statistic->sortByDesc('recovered')->values();
		}

		if (request('search'))
		{
			$countryName = $request->input('search');
			$statistic = Statistic::query()
			->where('country', 'LIKE', "%{$countryName}%")
			->get();
		}

		return view('countries', ['statistic'=>$statistic]);
	}
}
