<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class HandlePostCategoryRequest extends FormRequest
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
     * @param string $name
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:4', 'unique:post_categories,name'],
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
        parent::failedValidation($validator);
    }
}
