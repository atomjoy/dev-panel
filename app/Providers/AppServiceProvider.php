<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
		// Rewrite public dir to public_html shared hosting
		$this->app->usePublicPath(app()->basePath('public_html'));

		// $this->app->bind('path.public', function () {
		// 	return base_path() . '/public_html';
		// });
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		// Stripe event
		// Event::listen(SomeEvent::class);
	}
}
