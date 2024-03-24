<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\demoController;
use App\Http\Controllers\PaymentController;

Route::prefix('payment')->group(function () {
    Route::post('/', [PaymentController::class, 'payment']);
    Route::get('/info/{payment_method}', [PaymentController::class, 'getInfo']);
});

