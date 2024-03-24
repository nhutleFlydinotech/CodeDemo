<?php
namespace App\Services\Payment\PaymentMethod;

interface PaymentConnector {
    public function login();

    public function getInfo();

    public function charge($money);
}
