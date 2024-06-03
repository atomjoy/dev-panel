<?php

namespace Database\Factories;

use App\Models\Social;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Social>
 */
class SocialFactory extends Factory
{
	protected $model = Social::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'name' => uniqid("link-"),
			'icon' => 'fa-solid fa-circle-info',
			'url' => $this->faker->imageUrl(256, 256, 'animals', true),
		];
	}
}
