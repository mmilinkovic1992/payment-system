<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTravelPaymentRequest;
use App\Http\Requests\UpdateTravelPaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use App\Models\TravelPayment;
use Illuminate\Http\JsonResponse;

class TravelPaymentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTravelPaymentRequest $request
     * @return JsonResponse
     */
    public function store(StoreTravelPaymentRequest $request): JsonResponse
    {
        $this->authorize('create', TravelPayment::class);

        $payment = TravelPayment::create($request->getData());

        return response()->json(PaymentResource::make($payment), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TravelPayment  $travelPayment
     * @return \Illuminate\Http\Response
     */
    public function show(TravelPayment $travelPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTravelPaymentRequest  $request
     * @param  \App\Models\TravelPayment  $travelPayment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTravelPaymentRequest $request, TravelPayment $travelPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TravelPayment  $travelPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(TravelPayment $travelPayment)
    {
        //
    }
}
