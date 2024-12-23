<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Events\LoggedUser;
use App\Events\LoggedUserError;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoggedController extends Controller
{
	function index(Request $request)
	{
		if (Auth::check()) {
			LoggedUser::dispatch(Auth::user());

			return response()->json([
				'message' => __('logged.authenticated'),
				'user' => Auth::user()->fresh([
					'profile', 'address', 'roles',
					'roles_permissions', 'social', 'social_sorted'
				]),
			], 200);
		} else {
			LoggedUserError::dispatch();

			return response()->json([
				'message' => __('logged.unauthenticated'),
				'user' => null
			], 422);
		}
	}
}
