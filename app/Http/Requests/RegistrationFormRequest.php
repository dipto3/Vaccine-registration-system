<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nid' => 'required|numeric|unique:users,nid',
            'phone' => 'required|numeric|unique:users,phone',
            'center' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already used.',
            'nid.required' => 'The NID field is required.',
            'nid.numeric' => 'The NID must be a numeric value.',
            'nid.unique' => 'This NID is already in use.',
            'phone.required' => 'The phone field is required.',
            'phone.numeric' => 'The phone must be a numeric value.',
            'phone.unique' => 'This phone number is already used.',
            'center.required' => 'Please select a vaccine center.',
        ];
    }
}
