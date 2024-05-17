<?php

namespace Bui\Payment\Services;

use Illuminate\Support\Facades\Http;

class WalletService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('buipayment.api_key');
        $this->baseUrl = config('buipayment.base_url');
    }

    public function getWallets()
    {
        return Http::withToken($this->apiKey)->get($this->baseUrl . 'wallets')->json();
    }

    public function getWalletBalance($walletId)
    {
        return Http::withToken($this->apiKey)->get($this->baseUrl . 'wallets/' . $walletId)->json();
    }

    public function payin($data)
    {
        return Http::withToken($this->apiKey)->post($this->baseUrl . 'wallets/payin', $data)->json();
    }

    public function payout($data)
    {
        return Http::withToken($this->apiKey)->post($this->baseUrl . 'wallets/payout', $data)->json();
    }
}
