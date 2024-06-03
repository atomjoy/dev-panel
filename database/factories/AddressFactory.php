<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
	protected $model = Address::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'country' => fake()->country(),
			'state' => fake()->state(),
			'city' => fake()->city(),
			'line1' => fake()->streetAddress(),
			'line2' => '',
			'postal_code' => fake()->postcode(),
			'private' => true,
		];
	}
}
