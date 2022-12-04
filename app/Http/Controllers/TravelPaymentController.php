<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTravelPaymentRequest;
use App\Http\Requests\UpdateTravelPaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Http\Resources\TravelPaymentResource;
use App\Models\Payment;
use App\Models\TravelPayment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TravelPaymentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTravelPaymentRequest $request
     * @return JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreTravelPaymentRequest $request): JsonResponse
    {
        $this->authorize('create', TravelPayment::class);

        $payment = TravelPayment::create($request->getData());

        return response()->json(TravelPaymentResource::make($payment), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param TravelPayment $travelPayment
     * @return Response
     */
    public function show(TravelPayment $travelPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTravelPaymentRequest $request
     * @param TravelPayment $travelPayment
     * @return JsonResponse
     */
    public function update(UpdateTravelPaymentRequest $request, TravelPayment $travelPayment): JsonResponse
    {
        $travelPayment->update($request->getData());

        return response()->json([
            TravelPaymentResource::make($travelPayment)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TravelPayment $travelPayment
     * @return Response
     */
    public function destroy(TravelPayment $travelPayment)
    {
        //
    }
}
