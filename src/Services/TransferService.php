<?php

namespace Bui\Payment\Services;

use Illuminate\Support\Facades\Http;

class TransferService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('buipayment.api_key');
        $this->baseUrl = config('buipayment.base_url');
    }

    public function makeTransfer($data)
    {
        return Http::withToken($this->apiKey)->post($this->baseUrl . 'transfers', $data)->json();
    }

    public function getTransferStatus($transferId)
    {
        return Http::withToken($this->apiKey)->get($this->baseUrl . 'transfers/' . $transferId)->json();
    }
}
