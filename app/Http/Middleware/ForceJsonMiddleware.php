<?php

namespace App\Http\Middleware;

use Closure;
use App\Exceptions\JsonException;

/**
 *  Only json response allowed
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @return mixed
 *
 */
class ForceJsonMiddleware
{
	public function handle($request, Closure $next)
	{
		$this->locales($request);

		$this->acceptJson($request);

		if ($request->is('web/api/*') && !$request->wantsJson()) {
			throw new JsonException(__('middleware.not.acceptable'), 406);
		}

		return $next($request);
	}

	function acceptJson(&$request)
	{
		if (config('enable_accept_json', false)) {
			$request->headers->set('Accept', 'application/json');
		}
	}

	public function locales(&$request)
	{
		if (config('enable_locales', true)) {
			$lang =  session('locale', config('app.locale'));

			app()->setLocale($lang);

			if ($request->has('locale')) {
				app()->setLocale($request->query('locale'));
			}
		}
	}
}
