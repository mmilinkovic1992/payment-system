<?php

namespace App\Policies;

use App\Models\PaymentApproval;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentApprovalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->isApprover();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaymentApproval  $paymentApproval
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PaymentApproval $paymentApproval)
    {
        return $user->isApprover() && $user->id === $paymentApproval->id;
    }
}
