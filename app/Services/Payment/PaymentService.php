<?php
namespace App\Services\Payment;

use App\Services\Payment\PaymentFactory\BaseFactory;
use App\Services\Payment\PaymentFactory\AppleFactory;
use App\Services\Payment\PaymentFactory\PayJPFactory;

class PaymentService
{
    public function __construct()
    {

    }

    public function selectPaymentMethod($paymentTag)
    {
        switch (strtolower(trim($paymentTag))) {
            case 'payjp':
                return new PayJPFactory('access token PayJP');

            case 'apple':
                return new AppleFactory('access token Apple');

            default:
                return false;
        }
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
