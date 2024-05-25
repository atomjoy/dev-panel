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

class UploadAvatarController extends Controller
{
	protected $disk = 's3';

	function index(UploadAvatarRequest $request)
	{
		try {
			$user =  Auth::user();

			$filename = $user->id . '.webp';

			// $path = $request->file('avatar')->storeAs('avatars', $filename, 'public');

			$path = Storage::disk($this->disk)
				->putFileAs(
					'avatars',
					$request->file('avatar'),
					$filename
				);

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

			if (Storage::disk($this->disk)->exists($filename)) {
				Storage::disk($this->disk)->delete($filename);
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

			$exists = Storage::disk($this->disk)->exists($filename);

			if ($exists) {
				$mime = Storage::disk($this->disk)->mimeType($filename);

				$content = Storage::disk($this->disk)->get($filename);

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
	 *	Get s3 file url.
	 */
	public function getUrl()
	{
		$path = strip_tags(stripslashes(request('path')));

		if (Storage::disk($this->disk)->exists($path)) {
			return Storage::disk($this->disk)->url($path);
			// return Storage::disk($this->disk)->temporaryUrl($path, now()->addMinutes(60));
		}

		return config(
			'error_file_placeholder',
			'https://placehold.co/256x256?font=roboto&text=Invalid\nFile'
		);
		// 'https://picsum.photos/256/256.webp?grayscale&blur=2'
	}
}
