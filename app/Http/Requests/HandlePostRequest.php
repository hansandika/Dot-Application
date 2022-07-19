<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class HandlePostRequest extends FormRequest
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
     * @param int $category
     * @param string $title
     * @param string $description
     * @param string image
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category' => ['required'],
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:7'],
            'image' => ['mimes:jpeg,jpg,png,gif']
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
