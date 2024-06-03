<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateSocialRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return Auth::check(); // logged only
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
	 */
	public function rules(): array
	{
		return [
			'name' => [
				'required', 'max:30',
				Rule::unique('socials')->ignore($this->user()->id, 'user_id'),
			],
			'url' => 'required|max:500',
			'icon' => 'sometimes|max:30',
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
		$this->merge([
			collect(request()->json()->all())->only([
				'name', 'icon', 'url', 'id'
			])->toArray()
		]);
	}
}
