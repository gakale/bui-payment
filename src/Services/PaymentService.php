<?php

namespace Bui\Payment\Services;

use Illuminate\Support\Facades\Http;

class PaymentService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('buipayment.api_key');
        $this->baseUrl = config('buipayment.base_url');
    }

    public function getServices()
    {
        return Http::withToken($this->apiKey)->get($this->baseUrl . 'services')->json();
    }

    public function makePayment($data)
    {
        return Http::withToken($this->apiKey)->post($this->baseUrl . 'payments', $data)->json();
    }

    public function getPaymentStatus($paymentId)
    {
        return Http::withToken($this->apiKey)->get($this->baseUrl . 'payments/' . $paymentId)->json();
    }
}
