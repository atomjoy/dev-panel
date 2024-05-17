<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exceptions\JsonException;
use App\Http\Requests\PasswordChangeRequest;
use App\Events\PasswordChange;
use App\Events\PasswordChangeError;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;

class PasswordChangeController extends Controller
{
	function index(PasswordChangeRequest $request)
	{
		$valid = $request->validated();

		if (Auth::guard('admin')->check()) {
			$user = Auth::guard('admin')->user();

			if (Hash::check($valid['password_current'], $user->password)) {
				try {
					// Tests error
					$request->testDatabase();

					$user->update([
						'password' => Hash::make($valid['password']),
					]);

					PasswordChange::dispatch($user);
					return response()->json([
						'message' => __('apilogin.change.success')
					], 200);
				} catch (Exception $e) {
					report($e);
					PasswordChangeError::dispatch($valid);
					throw new JsonException(__('apilogin.change.error'), 422);
				}
			} else {
				PasswordChangeError::dispatch($valid);
				throw new JsonException(__('apilogin.change.invalid.current.password'), 422);
			}
		} else {
			PasswordChangeError::dispatch($valid);
			throw new JsonException(__('apilogin.change.unauthenticated.'), 422);
		}
	}
}
