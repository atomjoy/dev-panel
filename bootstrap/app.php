<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Cors;

return Application::configure(basePath: dirname(__DIR__))
	->withRouting(
		web: __DIR__ . '/../routes/web.php',
		commands: __DIR__ . '/../routes/console.php',
		health: '/up',
	)
	->withMiddleware(function (Middleware $middleware) { // function or class with __invokable function
		// Disable cors (or use route withoutMiddleware('ValidateCsrfToken'))
		$middleware->validateCsrfTokens(except: [
			// env('APP_URL') . '/api/js-post-search',
			// 'http://example.com/foo/*',
			// '/api/stripe/*',
		]);

		// Stripe webhook
		$middleware->validateCsrfTokens(except: [
			'/stripe/webhook',
		]);

		// $middleware->alias([
		// 	'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
		// 	'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
		// 	'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
		// ]);

		// Alias
		// $middleware->alias([ // 'some_key' => \App\Http\Middleware\MyMiddleware::class, ]);

		// All routes
		// $middleware->append([ \App\Http\Middleware\MyMiddleware::class ]);

		// Group
		// $middleware->appendToGroup('web', \App\Http\Middleware\MyMiddleware::class);

		// Cors middleware
		// $middleware->append(Cors::class);

		// Cookie
		// $middleware->encryptCookies(except: [
		// 	'cookie_name',
		// ]);
	})
	->withExceptions(function (Exceptions $exceptions) {
		//
	})->create();
