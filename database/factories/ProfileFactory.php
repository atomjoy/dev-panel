<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
	protected $model = Profile::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'username' => uniqid("user."),
			'name' => fake()->name(),
			'location' => fake()->city(),
			'bio' => fake()->sentence(10),
			'avatar' => 'https://source.unsplash.com/random/256x256',
			'banner' => 'https://source.unsplash.com/random/1920x540'
			// 'avatar' => $this->faker->imageUrl(256, 256, 'animals', true),
		];
	}
}
