<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
   
    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json(['success' => false,'message' => $validator->errors()], 412));
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'first_name' => 'required|string|max: 255',
            'last_name' => 'required|string|max: 255',
            'email' => 'required|string|email|max: 255|unique:users',
            'phone_number' => 'required|string|max:15|regex:/^\+?[0-9\s\-]+$/',
            'password' => 'required|string|min: 6',
        ];
    }
}
