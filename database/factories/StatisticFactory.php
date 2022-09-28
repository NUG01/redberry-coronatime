<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Statistic>
 */
class StatisticFactory extends Factory
{
	public function definition()
	{
		return [
			'name'        => json_encode(['en' => fake()->word(), 'ka'=>fake()->word()]),
			'country'     => fake()->word(),
			'country_code'=> fake()->word(),
			'confirmed'   => fake()->randomNumber(),
			'recovered'   => fake()->randomNumber(),
			'critical'    => fake()->randomNumber(),
			'deaths'      => fake()->randomNumber(),
		];
	}
}
