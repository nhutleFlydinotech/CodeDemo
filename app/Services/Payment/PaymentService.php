<?php
namespace App\Services\Payment;

use App\Services\Payment\PaymentFactory\BaseFactory;

class PaymentService
{
    public function __construct()
    {

    }

    public function payment(BaseFactory $payment, $params)
    {
        try {
            return $payment->payment(intval($params['money']));
        } catch (\Exception $e) {
            Log::error($e);

            return false;
        }
    }
}
