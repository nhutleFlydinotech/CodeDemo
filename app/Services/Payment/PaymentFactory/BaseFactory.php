<?php
namespace App\Services\Payment\PaymentFactory;

abstract class BaseFactory
{
    abstract public function getPaymentMethod();

    abstract public function payment($money);

    public function getInfo()
    {
        $paymentMethod = $this->getPaymentMethod();
        $paymentMethod->login();

        return $paymentMethod->getInfo();
    }
}
