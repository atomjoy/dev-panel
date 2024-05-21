<?php

namespace App\Http\Middleware;

use Closure;
use App\Exceptions\JsonException;
use Illuminate\Support\Facades\Auth;

/**
 *  Only json response allowed
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @return mixed
 */
class AuthAdminMiddleware
{
	public function handle($request, Closure $next)
	{
		if (!Auth::guard('admin')->check() || Auth::guard('admin')->user()->is_admin != 1) {
			throw new JsonException(__('middleware.invalid.is_admin'), 403);
		}

		return $next($request);
	}
}
