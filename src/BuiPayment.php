<?php
namespace Bui\Payment;

use Bui\Payment\Services\PaymentService;
use Bui\Payment\Services\TransferService;
use Bui\Payment\Services\WalletService;

class BuiPayment
{
    protected $paymentService;
    protected $transferService;
    protected $walletService;

    public function __construct()
    {
        $this->paymentService = new PaymentService();
        $this->transferService = new TransferService();
        $this->walletService = new WalletService();
    }

    // Payment Methods
    public function getServices()
    {
        return $this->paymentService->getServices();
    }

    public function makePayment($data)
    {
        return $this->paymentService->makePayment($data);
    }

    public function getPaymentStatus($paymentId)
    {
        return $this->paymentService->getPaymentStatus($paymentId);
    }

    // Transfer Methods
    public function makeTransfer($data)
    {
        return $this->transferService->makeTransfer($data);
    }

    public function getTransferStatus($transferId)
    {
        return $this->transferService->getTransferStatus($transferId);
    }

    // Wallet Methods
    public function getWallets()
    {
        return $this->walletService->getWallets();
    }

    public function getWalletBalance($walletId)
    {
        return $this->walletService->getWalletBalance($walletId);
    }

    public function payin($data)
    {
        return $this->walletService->payin($data);
    }

    public function payout($data)
    {
        return $this->walletService->payout($data);
    }
}
