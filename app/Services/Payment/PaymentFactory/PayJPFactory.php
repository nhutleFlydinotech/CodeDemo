<?php
namespace App\Services\Payment\PaymentFactory;

use App\Services\Payment\PaymentMethod\PayJP;

class PayJPFactory extends BaseFactory
{
    protected $accessToken;

    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function getPaymentMethod(): PayJP
    {
        return new PayJP($this->accessToken);
    }

    public function payment($money)
    {
        try {
            $payJP = $this->getPaymentMethod();
            $payJP->login();
            $payJP->charge($money);

            return true;
        } catch (\Exception $e) {
            Log::error($e);

            return false;
        }
    }
}
