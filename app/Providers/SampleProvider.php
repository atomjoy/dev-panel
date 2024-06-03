<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Middleware\RoleMiddleware;

class SampleProvider extends ServiceProvider
{
	/**
	 * Register services.
	 */
	public function register(): void
	{
		// Rewrite public dir
		// app()->usePublicPath(app()->basePath('public_html'));
		// app()->bind('path.public', function () {
		// 	return base_path() . '/public_html';
		// });

		// Rewrite public dir
		// $this->app->bind('path.public', function () {
		// 	return base_path() . '/public_html';
		// });

		// Binding
		// $this->app->singleton(Connection::class, function (Application $app) {
		// 	return new Connection(config('riak'));
		// });

		// Guard and provider for multi guards
		// $this->app->config["auth.guards.admin"] = [
		// 	'driver' => 'session',
		// 	'provider' => 'admins',
		// ];
		// $this->app->config["auth.providers.admins"] = [
		// 	'driver' => 'eloquent',
		// 	'model' => \App\Models\Admin::class,
		// ];

		// Middleware
		// $this->app['router']->aliasMiddleware('role', RoleMiddleware::class);
	}

	/**
	 * Bootstrap services.
	 */
	public function boot(): void
	{
		// Implicitly grant "Super Admin" role all permissions
		// This works in the app by using gate-related functions like auth()->user->can() and @can()
		// Gate::before(function ($user, $ability) {
		// 	return $user->hasRole('super_admin') ? true : null;
		// });
	}
}
