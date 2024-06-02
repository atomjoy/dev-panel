<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class UploadBannerRequest extends FormRequest
{
	protected $stopOnFirstFailure = true;

	public function authorize()
	{
		return Auth::check(); // Allow logged
	}

	public function rules()
	{
		return [
			'banner' => [
				'required',
				'mimes:webp,jpeg,jpg,png,gif',
				Rule::dimensions()
					->minWidth(config('default.banner_min_pixels', 1920))
					->minHeight(config('default.banner_min_pixels', 540)),
				Rule::dimensions()
					->maxWidth(config('default.banner_max_pixels', 2600))
					->maxHeight(config('default.banner_max_pixels', 2600)),
				Rule::file()->types(['webp', 'jpeg', 'jpg', 'png', 'gif'])
					->max(config('default.max_upload_size_mb', 5) * 1024),
			]
		];
	}

	public function failedValidation(Validator $validator)
	{
		throw new ValidationException($validator, response()->json([
			'message' => $validator->errors()->first()
		], 422));
	}

	function prepareForValidation()
	{
		$this->merge(
			collect(request()->json()->all())->only(['banner'])->toArray()
		);
	}
}
