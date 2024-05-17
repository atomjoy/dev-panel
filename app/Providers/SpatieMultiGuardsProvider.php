<?php

namespace App\Providers;

use App\Http\Middleware\AuthAdminMiddleware;
use App\Http\Middleware\ForceJsonMiddleware;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

class SpatieMultiGuardsProvider extends ServiceProvider
{
	/**
	 * Register services.
	 */
	public function register(): void
	{
		// Spatie multi guards admin guard and provider
		$this->app->config["auth.guards.admin"] = [
			'driver' => 'session',
			'provider' => 'admins',
		];

		$this->app->config["auth.providers.admins"] = [
			'driver' => 'eloquent',
			'model' => \App\Models\Admin::class,
		];

		// Locales, json web/api
		$this->app['router']->aliasMiddleware('forcejson', ForceJsonMiddleware::class);
		$this->app['router']->aliasMiddleware('ban_admin', AuthAdminMiddleware::class);

		// Spatie permissions
		$this->app['router']->aliasMiddleware('role', RoleMiddleware::class);
		$this->app['router']->aliasMiddleware('permission', PermissionMiddleware::class);
		$this->app['router']->aliasMiddleware('role_or_permission', RoleOrPermissionMiddleware::class);
	}

	/**
	 * Bootstrap services.
	 */
	public function boot(): void
	{
		// Implicitly grant "Super Admin" role all permissions
		// This works in the app by using gate-related
		// functions like auth()->user->can() and @can()
		Gate::before(function ($user, $ability) {
			return $user->hasRole('super_admin') ? true : null;
		});
	}
}
