<?php

namespace App\Rules;

use App\Models\Payment;
use App\Models\TravelPayment;
use Illuminate\Contracts\Validation\InvokableRule;

class PaymentExists implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (Payment::where('id', $value)->doesntExist() && TravelPayment::where('id', $value)->doesntExist()) {
            $fail(trans('validation.exists', ['attribute' => $attribute]));
        }
    }
}
