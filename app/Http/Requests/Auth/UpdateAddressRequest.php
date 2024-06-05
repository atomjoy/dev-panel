<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class UpdateAddressRequest extends FormRequest
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
			'line1' => 'sometimes|max:50',
			'line2' => 'sometimes|max:50',
			'city' => 'sometimes|max:50',
			'postal_code' => 'sometimes|max:50',
			'state' => 'sometimes|max:50',
			'country' => 'sometimes|max:50',
			'private' => 'sometimes|boolean',
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
				'country', 'state', 'city', 'line1', 'line2', 'postal_code', 'private'
			])->toArray()
		]);
	}
}
