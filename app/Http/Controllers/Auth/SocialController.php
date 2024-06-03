<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Events\SocialUser;
use App\Events\SocialUserError;
use App\Exceptions\JsonException;
use App\Http\Requests\Auth\UpdateSocialRequest;
use App\Models\Social;
use Exception;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
	/**
	 * Display the specified resource.
	 */
	public function show()
	{
		$user = User::with(['social'])->findOrFail(Auth::id());

		return response()->json([
			'social' => $user->social
		], 200);
	}

	/**
	 * Update social link.
	 */
	public function update(UpdateSocialRequest $request)
	{
		$valid = $request->validated();

		try {
			$user = User::with('social')->findOrFail(Auth::id());

			if ($user->social()->count() > config('default.max_social_links', 50)) {
				return response()->json(['message' => __("Too many links."),], 422);
			}

			Social::updateOrCreate([
				'user_id' => $user->id,
				'name' => $valid['name']
			], [
				'url' => $valid['url'],
				'icon' => $valid['icon'],
			]);

			SocialUser::dispatch($user);

			return response()->json([
				'message' => __("social.success"),
				'social' => $user->fresh(['social'])->social
			], 200);
		} catch (Exception $e) {
			report($e);
			SocialUserError::dispatch($valid);
			throw new JsonException(__("social.error"), 422);
		}
	}

	/**
	 * Delete social link.
	 */
	public function delete()
	{
		try {
			$user = User::with('social')->findOrFail(Auth::id());

			$link = Social::find((int) request('id'));

			if ($link instanceof Social && $link->user_id == Auth::id()) {
				$link->delete();
			}

			return response()->json([
				'message' => __("social.success"),
				'social' => $user->fresh(['social'])->social
			], 200);
		} catch (Exception $e) {
			report($e);
			throw new JsonException(__("social.error"), 422);
		}
	}

	/**
	 * Sort social link.
	 */
	public function sort()
	{
		try {
			$link = Social::find((int) request('id'));

			if ($link instanceof Social && $link->user_id == Auth::id()) {
				$link->sort = (int) request('position');
				$link->save();
			}

			return response()->json([
				'message' => __("social.success"),
			], 200);
		} catch (Exception $e) {
			report($e);
			throw new JsonException(__("social.error"), 422);
		}
	}
}
