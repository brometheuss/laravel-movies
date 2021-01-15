<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
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
            'editFullName' => 'required|regex:/^[A-Z][a-z]{1,15}(\s[A-z]{2,16})*$/',
            'editEmail' => 'required|email',
            'editPassword' => 'required|regex:/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
            'editPassword2' => 'required|regex:/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
        ];
    }

    public function messages()
    {
        return [
            'editFullName.required' => 'Please fill out your name.',
            'editFullName.regex' => 'Name must contain a capital letter and be at least 2 letters long.',
            'editEmail.required' => 'Please enter your email.',
            'editEmail.email' => 'Email format is incorrect.',
            'editPassword.required' => 'Please enter your password.',
            'editPassword.regex' => 'Password must contain a capital letter, 2 numbers and be at least 8 characters long.',
            'editPassword2.required' => 'Please confirm your password',
            'editPassword2.regex' => 'Confirm Password must contain a capital letter, 2 numbers and be at least 8 characters long.',
        ];
    }
}
