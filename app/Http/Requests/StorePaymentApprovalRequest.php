<?php

namespace App\Http\Requests;

use App\Rules\PaymentExists;
use Illuminate\Foundation\Http\FormRequest;

class StorePaymentApprovalRequest extends FormRequest
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
            'payment_id' => ['required', 'int', new PaymentExists],
            'payment_type' => ['required', 'string'],
            'status' => ['required']
        ];
    }

    /**
     * Get data for mass assigment.
     *
     * @return array
     */
    public function getData(): array
    {
        return [
            'user_id' => $this->user_id,
            'payment_id' => $this->payment_id,
            'payment_type' => $this->payment_type,
            'status' => $this->status
        ];
    }
}
