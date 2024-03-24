<?php
namespace App\Services\Payment\PaymentMethod;

use Illuminate\Support\Facades\Log;

class PayJP implements PaymentConnector
{
    protected $accessToken;

    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function login()
    {
        Log::info("Connect PayJP with access token: " . $this->accessToken);
    }

    public function getInfo()
    {
        Log::info("PayJp info: ", ['access token' => $this->accessToken]);
        return $this->accessToken;
    }

    public function charge($money)
    {
        Log::info("PayJp charge: " . $money);
    }
}
