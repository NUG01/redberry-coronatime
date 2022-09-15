<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\Statistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FetchApi extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'fetch:api';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Get data from api';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$countriesUrl = 'https://devtest.ge/countries';

		$response = Http::get($countriesUrl);
		$data = json_decode($response->body());

		foreach ($data as $countryData)
		{
			$countryData = (array)$countryData;
			Country::where('code', $countryData['code'])->delete();
			Statistic::where('country_code', $countryData['code'])->delete();
			
			Country::Create([
				'code'=> $countryData['code'],
				'name'=> [
					'en'=> $countryData['name']->en,
					'ka'=> $countryData['name']->ka,
				],
			]);
		}
		$codes = DB::table('countries')->pluck('code');

		foreach ($codes as $code)
		{
			$statistic = Http::post('https://devtest.ge/get-country-statistics', ['code'=>$code]);
			$dataStats = json_decode($statistic->body());
			$dataStats = (array)$dataStats;
			Statistic::Create([
				'id'          => $dataStats['id'],
				'country_code'=> $code,
				'country'     => $dataStats['country'],
				'confirmed'   => $dataStats['confirmed'],
				'recovered'   => $dataStats['recovered'],
				'deaths'      => $dataStats['deaths'],
				'critical'    => $dataStats['critical'],
			]);
		}
	}
}
