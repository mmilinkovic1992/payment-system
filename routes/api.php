<?php

use App\Http\Controllers\PaymentApprovalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SumOfApprovedPaymentsController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\TravelPaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/test', function () {
    $user = \Illuminate\Support\Facades\Auth::user();

    dd($user->approvals[1]->payment);
});

Route::resource('tokens', TokenController::class)->only(['store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('tokens', TokenController::class)->only(['destroy']);
    Route::resource('payments', PaymentController::class)->except(['create', 'edit', 'index']);
    Route::resource('travel-payments', TravelPaymentController::class)->except(['create', 'edit', 'index']);
    Route::resource('payment-approvals', PaymentApprovalController::class)->only('store', 'update');
    Route::get('sum-of-approved-payments', SumOfApprovedPaymentsController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
