<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class TokenRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'string', 'exists:users,email'],
            'password' => ['required', 'string'],
            'token' => ['string']
        ];
    }

    public function attempter(): ?User
    {
        return User::where('email', $this->email)->first();
    }
}
