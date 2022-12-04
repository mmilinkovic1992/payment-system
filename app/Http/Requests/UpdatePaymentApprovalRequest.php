<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentApprovalRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'status' => ['required']
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
            'status' => $this->status
        ];
    }
}
