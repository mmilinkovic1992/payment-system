<?php

namespace App\Policies;

use App\Models\TravelPayment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TravelPaymentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Payment  $payment
     * @return Response|bool
     */
    public function view(User $user, TravelPayment $payment)
    {
        return $user->id === $payment->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        return $user->isApprover();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Payment  $payment
     * @return Response|bool
     */
    public function update(User $user, TravelPayment $payment)
    {
        return $user->id === $payment->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Payment  $payment
     * @return Response|bool
     */
    public function delete(User $user, TravelPayment $payment)
    {
        return $user->id === $payment->user_id;
    }
}
