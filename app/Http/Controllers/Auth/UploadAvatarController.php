<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Http\Controllers\Controller;
use App\Events\UploadAvatar;
use App\Exceptions\JsonException;
use App\Http\Requests\Auth\UploadAvatarRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManager;

class UploadAvatarController extends Controller
{
	function index(UploadAvatarRequest $request)
	{
		// Validate
		// request()->validate(['avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048']);
		// Save
		// $path = $request->file('avatar')->storeAs('avatars', $filename, 'public');
		// Save with request
		// $path = Storage::putFileAs('avatars', $request->file('avatar'), $filename);

		try {
			$user =  Auth::user();

			$filename = $user->id . '.webp';

			$path = 'avatars/' . $filename;

			$image = ImageManager::gd()
				->read($request->file('avatar'))
				->resize(
					config('default.avatar_resize_pixels', 256),
					config('default.avatar_resize_pixels', 256)
				)->toWebp();

			Storage::put($path, (string) $image);

			$data = ['avatar' => $path];

			$profile = $user->fresh(['profile'])->profile;

			if ($profile == null) {
				$data = [
					'avatar' => $path,
					'name' => $user->name ?? 'Guest',
					'username' => uniqid('user.'),
				];
			}

			Profile::updateOrCreate([
				'user_id' => $user->id
			], $data);

			UploadAvatar::dispatch(Auth::user(), $path);

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

			$filename = 'avatars/' . Auth::id() . '.webp';

			if (Storage::exists($filename)) {
				Storage::delete($filename);
				Auth::user()->profile()->update(['avatar' => null]);
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
			$id = Auth::id() ?? 'error';

			$filename = '/avatars/' . $id . '.webp';

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

	/**
	 *	Get storage file url.
	 */
	public function getUrl()
	{
		$path = trim(strip_tags(stripslashes(request('path'))));

		if (Storage::exists($path)) {
			return Storage::url($path);
			// return Storage::temporaryUrl($path, now()->addMinutes(60));
			// <img src="{{ Storage::temporaryUrl($this->company->logo, '+2 minutes') }}">
		}

		return config('default.error_file_placeholder', 'https://placehold.co/128x128?font=roboto&text=INVALID\nFILE');
		// 'https://picsum.photos/256/256.webp?grayscale&blur=2'
	}
}
