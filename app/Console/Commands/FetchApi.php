<?php

namespace App\Console\Commands;

use App\Models\Statistic;
use Illuminate\Console\Command;
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
		$countries = Http::get('https://devtest.ge/countries')->json();

		foreach ($countries as $country)
		{
			$statistics = Http::post('https://devtest.ge/get-country-statistics', ['code'=>$country['code']])->json();
			Statistic::where('country_code', $country['code'])->delete();
			Statistic::updateOrCreate([
				'name'        => $country['name'],
				'country_code'=> $statistics['code'],
				'country'     => $statistics['country'],
				'confirmed'   => $statistics['confirmed'],
				'recovered'   => $statistics['recovered'],
				'deaths'      => $statistics['deaths'],
				'critical'    => $statistics['critical'],
			]);
		}
	}
}
