<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentApprovalRequest;
use App\Http\Requests\UpdatePaymentApprovalRequest;
use App\Http\Resources\PaymentApprovalResource;
use App\Models\PaymentApproval;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PaymentApprovalController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StorePaymentApprovalRequest $request
     * @return JsonResponse
     */
    public function store(StorePaymentApprovalRequest $request): JsonResponse
    {
        $this->authorize('create', PaymentApproval::class);

        PaymentApproval::create($request->getData());

        return response()->json([
            'message' => trans('common.approval_created')
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePaymentApprovalRequest $request
     * @param PaymentApproval $paymentApproval
     * @return JsonResponse
     */
    public function update(UpdatePaymentApprovalRequest $request, PaymentApproval $paymentApproval): JsonResponse
    {
        $this->authorize('update', $paymentApproval);

        $paymentApproval->update($request->getData());

        return response()->json([
            'message' => trans('common.approval_updated')
        ], 200);
    }
}
