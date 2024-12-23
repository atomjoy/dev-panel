<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Events\LoginUser;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	function index(LoginRequest $request)
	{
		$request->validated();

		$request->authenticate();

		$request->session()->regenerate();

		if (Auth::check()) {
			LoginUser::dispatch(Auth::user());

			if (Auth::user()->f2a == 1) {
				return response()->json([
					'message' => __('login.authenticated'),
					'user' => null,
					'redirect' => '/login/f2a/' . $request->f2a(),
				], 200);
			}

			return response()->json([
				'message' => __('login.authenticated'),
				'user' => Auth::user()->fresh([
					'profile', 'address', 'roles',
					'roles_permissions', 'social', 'social_sorted'
				]),
				'redirect' => null,
			], 200);
		} else {
			return response()->json([
				'message' => __('login.unauthenticated'),
				'user' => null,
				'redirect' => null,
			], 422);
		}
	}
}
