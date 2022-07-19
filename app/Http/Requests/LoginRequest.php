<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @param string $email
     * @param string $password 
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required'],
            'password' => ['required']
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
