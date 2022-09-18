<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Statistic;
use Illuminate\Http\Request;

class TableSortController extends Controller
{
	public function locationAsc(Request $request)
	{
		$statistic = Statistic::all();
		$statistic->sortBy('country')->values();
		if (request('search'))
		{
			$countryName = $request->input('search');
			$statistic = Statistic::query()
			->where('country', 'LIKE', "%{$countryName}%")
			->get();
		}

		return view('countries', ['data'=>$statistic, 'countries'=>Country::all()]);
	}

	public function locationDesc(Request $request)
	{
		$statistic = Statistic::all();
		$statistic = $statistic->sortByDesc('country')->values();

		if (request('search'))
		{
			$countryName = $request->input('search');
			$statistic = Statistic::query()
			->where('country', 'LIKE', "%{$countryName}%")
			->get();
		}

		return view('countries', ['data'=>$statistic, 'countries'=>Country::all()]);
	}

	public function newCasesAsc(Request $request)
	{
		$statistic = Statistic::all();
		$statistic = $statistic->sortBy('confirmed')->values();
		if (request('search'))
		{
			$countryName = $request->input('search');
			$statistic = Statistic::query()
			->where('country', 'LIKE', "%{$countryName}%")
			->get();
		}

		return view('countries', ['data'=>$statistic, 'countries'=>Country::all()]);
	}

	public function NewCasesDesc(Request $request)
	{
		$statistic = Statistic::all();
		$statistic = $statistic->sortByDesc('confirmed')->values();
		if (request('search'))
		{
			$countryName = $request->input('search');
			$statistic = Statistic::query()
			->where('country', 'LIKE', "%{$countryName}%")
			->get();
		}

		return view('countries', ['data'=>$statistic, 'countries'=>Country::all()]);
	}

	public function deathsAsc(Request $request)
	{
		$statistic = Statistic::all();
		$statistic = $statistic->sortBy('deaths')->values();
		if (request('search'))
		{
			$countryName = $request->input('search');
			$statistic = Statistic::query()
			->where('country', 'LIKE', "%{$countryName}%")
			->get();
		}

		return view('countries', ['data'=>$statistic, 'countries'=>Country::all()]);
	}

	public function deathsDesc(Request $request)
	{
		$statistic = Statistic::all();
		$statistic = $statistic->sortByDesc('deaths')->values();
		if (request('search'))
		{
			$countryName = $request->input('search');
			$statistic = Statistic::query()
			->where('country', 'LIKE', "%{$countryName}%")
			->get();
		}

		return view('countries', ['data'=>$statistic, 'countries'=>Country::all()]);
	}

	public function recoveredAsc(Request $request)
	{
		$statistic = Statistic::all();
		$statistic = $statistic->sortBy('recovered')->values();
		if (request('search'))
		{
			$countryName = $request->input('search');
			$statistic = Statistic::query()
			->where('country', 'LIKE', "%{$countryName}%")
			->get();
		}

		return view('countries', ['data'=>$statistic, 'countries'=>Country::all()]);
	}

	public function recoveredDesc(Request $request)
	{
		$statistic = Statistic::all();
		$statistic = $statistic->sortByDesc('recovered')->values();
		if (request('search'))
		{
			$countryName = $request->input('search');
			$statistic = Statistic::query()
			->where('country', 'LIKE', "%{$countryName}%")
			->get();
		}

		return view('countries', ['data'=>$statistic, 'countries'=>Country::all()]);
	}
}
