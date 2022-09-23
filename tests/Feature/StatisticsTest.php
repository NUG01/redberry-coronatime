<?php

namespace Tests\Feature;

use App\Models\Statistic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatisticsTest extends TestCase
{
	use RefreshDatabase;

	private User $user;

	private Statistic $stat;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
	}

	protected function setUp2(): void
	{
		parent::setUp();
		$this->stat = Statistic::factory()->create();
	}

	public function test_if_worldwide_view_is_present_with_sum_statistics()
	{
		$response = $this->actingAs($this->user)->get('/worldwide');

		$response->assertViewIs('worldwide');
		$response->assertViewHas(['data'=> $this->stat,
			'sumConfirmed'                 => $this->stat->sum('confirmed'),
			'sumRecovered'                 => $this->stat->sum('recovered'),
			'sumDeaths'                    => $this->stat->sum('deaths'), ]);
	}

	public function test_if_countries_view_is_present_with_statistics()
	{
		Statistic::Create([
			'name'        => ['en'=>fake()->word(), 'ka'=>fake()->word()],
			'country_code'=> fake()->word(),
			'country'     => fake()->word(),
			'confirmed'   => fake()->randomNumber(),
			'recovered'   => fake()->randomNumber(),
			'deaths'      => fake()->randomNumber(),
			'critical'    => fake()->randomNumber(),
		]);

		$response = $this->actingAs($this->user)->get('/countries');
		$response->assertViewIs('countries');
		$response->assertViewHas(['statistic'=>Statistic::all()]);
	}

	public function test_if_statistics_is_displayed_successfully_country_asc()
	{
		Statistic::Create([
			'name'        => ['en'=>fake()->word(), 'ka'=>fake()->word()],
			'country_code'=> fake()->word(),
			'country'     => fake()->word(),
			'confirmed'   => fake()->randomNumber(),
			'recovered'   => fake()->randomNumber(),
			'deaths'      => fake()->randomNumber(),
			'critical'    => fake()->randomNumber(),
		]);
		$stat = Statistic::filter()->get();

		$stat = $stat->sortBy('country')->values();
		$response = $this->actingAs($this->user)->get('/countries/location-ascend');
		$url = getenv('APP_URL');

		$value = (url()->current() == ($url . '/countries/location-ascend'));
		$bool = $value ? true : false;

		$this->assertTrue($bool);
		$response->assertSuccessful();
		$response->assertViewIs('countries');
		$response->assertViewHas(['statistic'=>$stat]);
	}

	public function test_if_statistics_is_displayed_successfully_country_desc()
	{
		Statistic::Create([
			'name'        => ['en'=>fake()->word(), 'ka'=>fake()->word()],
			'country_code'=> fake()->word(),
			'country'     => fake()->word(),
			'confirmed'   => fake()->randomNumber(),
			'recovered'   => fake()->randomNumber(),
			'deaths'      => fake()->randomNumber(),
			'critical'    => fake()->randomNumber(),
		]);
		$stat = Statistic::filter()->get();

		$stat = $stat->sortByDesc('country')->values();
		$response = $this->actingAs($this->user)->get('/countries/location-descend');
		$url = getenv('APP_URL');

		$value = (url()->current() == ($url . '/countries/location-ascend'));
		$bool = $value ? true : false;

		$this->assertTrue($bool);
		$response->assertSuccessful();
		$response->assertViewIs('countries');
		$response->assertViewHas(['statistic'=>$stat]);
	}

	public function test_if_statistics_is_displayed_successfully_confirmed_asc()
	{
		Statistic::Create([
			'name'        => ['en'=>fake()->word(), 'ka'=>fake()->word()],
			'country_code'=> fake()->word(),
			'country'     => fake()->word(),
			'confirmed'   => fake()->randomNumber(),
			'recovered'   => fake()->randomNumber(),
			'deaths'      => fake()->randomNumber(),
			'critical'    => fake()->randomNumber(),
		]);
		$stat = Statistic::filter()->get();

		$stat = $stat->sortBy('confirmed')->values();
		$response = $this->actingAs($this->user)->get('/countries/new-cases-ascend');
		$url = getenv('APP_URL');

		$value = (url()->current() == ($url . '/countries/new-cases-ascend'));
		$bool = $value ? true : false;

		$this->assertTrue($bool);
		$response->assertSuccessful();
		$response->assertViewIs('countries');
		$response->assertViewHas(['statistic'=>$stat]);
	}

	public function test_if_statistics_is_displayed_successfully_confirmed_desc()
	{
		Statistic::Create([
			'name'        => ['en'=>fake()->word(), 'ka'=>fake()->word()],
			'country_code'=> fake()->word(),
			'country'     => fake()->word(),
			'confirmed'   => fake()->randomNumber(),
			'recovered'   => fake()->randomNumber(),
			'deaths'      => fake()->randomNumber(),
			'critical'    => fake()->randomNumber(),
		]);
		$stat = Statistic::filter()->get();

		$stat = $stat->sortByDesc('confirmed')->values();
		$response = $this->actingAs($this->user)->get('/countries/new-cases-descend');
		$url = getenv('APP_URL');

		$value = (url()->current() == ($url . '/countries/new-cases-descend'));
		$bool = $value ? true : false;

		$this->assertTrue($bool);
		$response->assertSuccessful();
		$response->assertViewIs('countries');
		$response->assertViewHas(['statistic'=>$stat]);
	}

	public function test_if_statistics_is_displayed_successfully_deaths_asc()
	{
		Statistic::Create([
			'name'        => ['en'=>fake()->word(), 'ka'=>fake()->word()],
			'country_code'=> fake()->word(),
			'country'     => fake()->word(),
			'confirmed'   => fake()->randomNumber(),
			'recovered'   => fake()->randomNumber(),
			'deaths'      => fake()->randomNumber(),
			'critical'    => fake()->randomNumber(),
		]);
		$stat = Statistic::filter()->get();

		$stat = $stat->sortBy('deaths')->values();
		$response = $this->actingAs($this->user)->get('/countries/deaths-ascend');
		$url = getenv('APP_URL');

		$value = (url()->current() == ($url . '/countries/deaths-ascend'));
		$bool = $value ? true : false;

		$this->assertTrue($bool);
		$response->assertSuccessful();
		$response->assertViewIs('countries');
		$response->assertViewHas(['statistic'=>$stat]);
	}

	public function test_if_statistics_is_displayed_successfully_deaths_desc()
	{
		Statistic::Create([
			'name'        => ['en'=>fake()->word(), 'ka'=>fake()->word()],
			'country_code'=> fake()->word(),
			'country'     => fake()->word(),
			'confirmed'   => fake()->randomNumber(),
			'recovered'   => fake()->randomNumber(),
			'deaths'      => fake()->randomNumber(),
			'critical'    => fake()->randomNumber(),
		]);
		$stat = Statistic::filter()->get();

		$stat = $stat->sortByDesc('deaths')->values();
		$response = $this->actingAs($this->user)->get('/countries/deaths-descend');
		$url = getenv('APP_URL');

		$value = (url()->current() == ($url . '/countries/deaths-descend'));
		$bool = $value ? true : false;

		$this->assertTrue($bool);
		$response->assertSuccessful();
		$response->assertViewIs('countries');
		$response->assertViewHas(['statistic'=>$stat]);
	}

	public function test_if_statistics_is_displayed_successfully_recovered_asc()
	{
		Statistic::Create([
			'name'        => ['en'=>fake()->word(), 'ka'=>fake()->word()],
			'country_code'=> fake()->word(),
			'country'     => fake()->word(),
			'confirmed'   => fake()->randomNumber(),
			'recovered'   => fake()->randomNumber(),
			'deaths'      => fake()->randomNumber(),
			'critical'    => fake()->randomNumber(),
		]);
		$stat = Statistic::filter()->get();

		$stat = $stat->sortBy('recovered')->values();
		$response = $this->actingAs($this->user)->get('/countries/recovered-ascend');
		$url = getenv('APP_URL');

		$value = (url()->current() == ($url . '/countries/recovered-ascend'));
		$bool = $value ? true : false;

		$this->assertTrue($bool);
		$response->assertSuccessful();
		$response->assertViewIs('countries');
		$response->assertViewHas(['statistic'=>$stat]);
	}

	public function test_if_statistics_is_displayed_successfully_recovered_desc()
	{
		Statistic::Create([
			'name'        => ['en'=>fake()->word(), 'ka'=>fake()->word()],
			'country_code'=> fake()->word(),
			'country'     => fake()->word(),
			'confirmed'   => fake()->randomNumber(),
			'recovered'   => fake()->randomNumber(),
			'deaths'      => fake()->randomNumber(),
			'critical'    => fake()->randomNumber(),
		]);
		$stat = Statistic::filter()->get();

		$stat = $stat->sortByDesc('recovered')->values();
		$response = $this->actingAs($this->user)->get('/countries/recovered-descend');
		$url = getenv('APP_URL');

		$value = (url()->current() == ($url . '/countries/recovered-descend'));
		$bool = $value ? true : false;

		$this->assertTrue($bool);
		$response->assertSuccessful();
		$response->assertViewIs('countries');
		$response->assertViewHas(['statistic'=>$stat]);
	}
}
