<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Payment\PaymentService;
use App\Http\Requests\Payment\PaymentRequest;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function payment(PaymentRequest $request)
    {
        $payer = $this->paymentService->selectPaymentMethod($request->get('payment_method'));

        if (!$payer) {
            return response()->json(['message' => 'Payment method not found !!!'], 403);
        }

        if($this->paymentService->payment($payer, $request->validated())) {
            return response()->json(['message' => 'Payment successfully'], 200);
        }

        return response()->json(['message' => 'Payment failure'], 403);
    }

    public function getInfo($paymentMethod)
    {
        $payer = $this->paymentService->selectPaymentMethod($paymentMethod);

        if (!$payer) {
            return response()->json(['message' => 'Payment method not found !!!'], 403);
        }

        $info = $payer->getInfo();

        if($info) {
            return response()->json(['data' => $info], 200);
        }

        return response()->json(['message' => 'failure'], 403);
    }
}
