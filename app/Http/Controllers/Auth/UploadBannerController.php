<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Http\Controllers\Controller;
use App\Events\UploadBanner;
use App\Exceptions\JsonException;
use App\Http\Requests\Auth\UploadBannerRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManager;

class UploadBannerController extends Controller
{
	function index(UploadBannerRequest $request)
	{
		// Validate
		// request()->validate(['banner' => 'required|image|mimes:jpeg,png,jpg|max:2048']);
		// Save
		// $path = $request->file('banner')->storeAs('banners', $filename, 'public');
		// Save with request
		// $path = Storage::putFileAs('banners', $request->file('banner'), $filename);

		try {
			$user =  Auth::user();

			$filename = $user->id . '.webp';

			$path = 'banners/' . $filename;

			$image = ImageManager::gd()
				->read($request->file('banner'))
				// ->scale(config('default.banner_scale_pixels', 1920))
				->crop(
					config('default.banner_resize_width', 1920),
					config('default.banner_resize_height', 540),
					0,
					0,
					position: 'center-center'
				)
				->toWebp();

			Storage::put($path, (string) $image);

			$data = ['banner' => $path];

			$profile = $user->fresh(['profile'])->profile;

			if ($profile == null) {
				$data = [
					'banner' => $path,
					'name' => $user->name ?? 'Guest',
					'username' => uniqid('user.'),
				];
			}

			Profile::updateOrCreate([
				'user_id' => $user->id
			], $data);

			UploadBanner::dispatch(Auth::user(), $path);

			return response()->json([
				'message' => __('upload.banner.success'),
				'banner' => $path,
			], 200);
		} catch (Exception $e) {
			report($e);
			throw new JsonException(__('upload.banner.error'), 422);
		}
	}

	function remove(Request $request)
	{
		try {

			$filename = 'banners/' . Auth::id() . '.webp';

			if (Storage::exists($filename)) {
				Storage::delete($filename);
				Auth::user()->profile()->update(['banner' => null]);
			}

			return response()->json([
				'message' => __('remove.banner.success'),
			], 200);
		} catch (Exception $e) {
			report($e);
			throw new JsonException(__('remove.banner.error'), 422);
		}
	}

	public function show()
	{
		return $this->showBanner();
	}

	/**
	 *	Show banner only for logged in users.
	 */
	public function showBanner($default_banner = 'js/components/input/profil/banner.png')
	{
		try {
			$id = Auth::id() ?? 'error';

			$filename = '/banners/' . $id . '.webp';

			$exists = Storage::exists($filename);

			if ($exists) {
				$mime = Storage::mimeType($filename);

				$content = Storage::get($filename);

				$response = Response::make($content, 200);

				$response->header("Content-Type", $mime);

				return $response;
			} else {
				$default = resource_path($default_banner);

				if (!file_exists($default)) {
					$default = fake()->image(
						null,
						128,
						128,
						null,
						true,
						true,
						'banner',
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
			throw new JsonException(__('show.banner.error'), 422);
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
