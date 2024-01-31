<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255|exists:users,email',
            'password' => 'required|string|min:5|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
