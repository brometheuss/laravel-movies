<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_register' => 'required|regex:/^[A-Z][a-z]{1,15}(\s[A-z]{2,16})*$/',
            'email_register' => 'required|email',
            'pass_register' => 'required|regex:/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
            'pass2_register' => 'required|regex:/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
        ];
    }

    public function messages()
    {
        return[
            'name_register.required' => 'Please fill out your name.',
            'name_register.regex' => 'Name must contain a capital letter and be at least 2 letters long.',
            'email_register.required' => 'Please enter your email.',
            'email_register.email' => 'Email format is incorrect.',
            'pass_register.required' => 'Please enter your password.',
            'pass_register.regex' => 'Password must contain a capital letter, 2 numbers and be at least 8 characters long.',
            'pass2_register.required' => 'Please confirm your password',
            'pass2_register.regex' => 'Password must contain a capital letter, 2 numbers and be at least 8 characters long.',
        ];
    }
}
