<?php

namespace App\Http\Controllers\Auth\Admin;

use Exception;
use App\Http\Controllers\Controller;
use App\Events\UploadAvatar;
use App\Exceptions\JsonException;
use App\Http\Requests\Auth\UploadAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class UploadAvatarController extends Controller
{
	function index(UploadAvatarRequest $request)
	{
		try {
			Auth::shouldUse('admin');

			$user =  Auth::user();

			$filename = $user->id . '.webp';

			// $path = $request->file('avatar')->storeAs('avatars/admin', $filename, 'public');

			$path = Storage::putFileAs(
				'avatars/admin',
				$request->file('avatar'),
				$filename
			);

			$user->avatar = $path;
			$user->save();

			UploadAvatar::dispatch($user, $path);

			return response()->json([
				'message' => __('upload.avatar.success'),
				'avatar' => $path,
			], 200);
		} catch (Exception $e) {
			report($e);
			throw new JsonException(__('upload.avatar.error'), 422);
		}
	}

	function remove(Request $request)
	{
		try {
			Auth::shouldUse('admin');

			$filename = 'avatars/admin/' . Auth::id() . '.webp';

			if (Storage::exists($filename)) {
				Storage::delete($filename);
				Auth::user()->update(['avatar' => null]);
			}

			return response()->json([
				'message' => __('remove.avatar.success'),
			], 200);
		} catch (Exception $e) {
			report($e);
			throw new JsonException(__('remove.avatar.error'), 422);
		}
	}

	public function show()
	{
		return $this->showAvatar();
	}

	/**
	 *	Show avatar only for logged in users.
	 */
	public function showAvatar($default_avatar = 'js/components/input/profil/avatar.png')
	{
		try {
			Auth::shouldUse('admin');

			$id = Auth::id() ?? 'error';

			$filename = '/avatars/admin/' . $id . '.webp';

			$exists = Storage::exists($filename);

			if ($exists) {
				$mime = Storage::mimeType($filename);

				$content = Storage::get($filename);

				$response = Response::make($content, 200);

				$response->header("Content-Type", $mime);

				return $response;
			} else {
				$default = resource_path($default_avatar);

				if (!file_exists($default)) {
					$default = fake()->image(
						null,
						128,
						128,
						null,
						true,
						true,
						'avatar',
						true,
						'png'
					);
				}

				return response(
					file_get_contents($default)
				)->header('Content-Type', 'image/png');
			}
		} catch (Exception $e) {
			report($e);
			throw new JsonException(__('show.avatar.error'), 422);
		}
	}
}
