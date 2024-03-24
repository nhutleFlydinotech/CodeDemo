<?php
namespace App\Services\Payment\PaymentMethod;

use Illuminate\Support\Facades\Log;

class Apple implements PaymentConnector
{
    protected $accessToken;

    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function login()
    {
        Log::info("Connect Apple with access token: " . $this->accessToken);
    }

    public function getInfo()
    {
        Log::info("Apple info: ", ['access token' => $this->accessToken]);
        return $this->accessToken;
    }

    public function charge($money)
    {
        Log::info("Apple charge: " . $money);
    }
}
