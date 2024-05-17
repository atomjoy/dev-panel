<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Events\AddressUser;
use App\Events\AddressUserError;
use App\Exceptions\JsonException;
use App\Http\Requests\UpdateAddressRequest;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
	/**
	 * Display the specified resource.
	 */
	public function show()
	{
		$user = User::with('address')->findOrFail(Auth::id());

		return response()->json([
			'address' => $user->address
		], 200);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateAddressRequest $request)
	{
		$valid = $request->validated();
		try {
			$user = User::with('address')->findOrFail(Auth::id());

			$user->address()->updateOrCreate([
				'user_id' => $user->id
			], $valid);

			AddressUser::dispatch($user);

			return response()->json([
				'message' => __("apilogin.address.success"),
				'address' => $user->fresh(['address'])->address
			], 200);
		} catch (Exception $e) {
			report($e);
			AddressUserError::dispatch($valid);
			throw new JsonException(__("apilogin.address.error"), 422);
		}
	}
}
