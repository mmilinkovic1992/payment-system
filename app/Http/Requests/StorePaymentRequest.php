<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => ['required', 'int', 'exists:users,id'],
            'total_amount' => ['required', 'numeric']
        ];
    }

    /**
     * Return data for mass assigment.
     *
     * @return array
     */
    public function getData(): array
    {
        return [
            'user_id' => $this->user_id,
            'total_amount' => $this->total_amount
        ];
    }
}
