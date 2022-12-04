<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PaymentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StorePaymentRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(StorePaymentRequest $request): JsonResponse
    {
        $this->authorize('create', Payment::class);

        $payment = Payment::create($request->getData());

        return response()->json(PaymentResource::make($payment), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Payment $payment
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function show(Payment $payment): JsonResponse
    {
        $this->authorize('view', $payment);

        return response()->json(PaymentResource::make($payment), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePaymentRequest $request
     * @param Payment $payment
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(UpdatePaymentRequest $request, Payment $payment): JsonResponse
    {
        $this->authorize('update', $payment);

        $payment->update($request->getData());

        return response()->json([
            PaymentResource::make($payment)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Payment $payment
     * @return Response
     * @throws AuthorizationException
     */
    public function destroy(Payment $payment): JsonResponse
    {
        $this->authorize('delete', $payment);

        $payment->delete();

        return response()->json([
            'message' => trans('common.payment_deleted')
        ], 200);
    }
}
