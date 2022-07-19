<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     * @param date $dob
     * @param string $password
     * @param string $image
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'dob' => ['required', 'date', 'before:today'],
            'password' => ['nullable', 'min:7', 'alpha_num'],
            'image' => ['mimes:jpeg,jpg,png,gif'],
        ];
    }

    /**
     * @param Illuminate\Contracts\Validation\Validator $validator
     * Overwrite validation method to add custom response
     */
    protected function failedValidation(Validator $validator)
    {
        if (request()->is('api/*')) {
            $response = [
                'status' => 400,
                'message' => $validator->errors()->first(),
                'data' => $validator->errors()
            ];
            throw new HttpResponseException(response()->json($response, 400));
        }
    }
}
