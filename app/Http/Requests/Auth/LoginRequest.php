<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->id,
            'password' => 'required|string|min:5|max:255|confirmed',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
