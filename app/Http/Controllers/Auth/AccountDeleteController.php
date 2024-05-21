<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Events\AccountDelete;
use App\Events\AccountDeleteError;
use App\Exceptions\JsonException;
use App\Http\Requests\Auth\UpdateAccountDeleteRequest;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountDeleteController extends Controller
{
	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateAccountDeleteRequest $request)
	{
		$valid = $request->validated();

		try {
			$user = Auth::user();

			if (Hash::check($valid['current_password'], $user->password)) {

				$user->forceFill([
					'email' => '#del#' . time() . '#' . str_replace('@', '#', $user->email),
					'password' => '#del#' . microtime(),
					'remember_token' => null,
				])->save();

				$profile = Profile::where('user_id', $user->id)->first();

				if ($profile instanceof Profile) {
					$profile->forceFill([
						'username' => '#del#' . time() . '#' . $profile->username,
						'deleted_at' => now()
					])->save();
				}

				AccountDelete::dispatch($user);

				if (config('account_delete_logout', true)) {
					Auth::logout();
					$request->session()->invalidate();
					$request->session()->regenerateToken();
				}

				return response()->json([
					'message' => __("account.delete.success"),
				], 200);
			}
		} catch (Exception $e) {
			report($e);
			AccountDeleteError::dispatch($valid);
			throw new JsonException(__("account.delete.error"), 422);
		}
	}
}
