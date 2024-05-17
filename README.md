# BuiPayment Package Laravel

Un package Laravel pour intégrer les paiements avec l'API Bui Corporation.

## Installation

### Prérequis

Assurez-vous d'avoir installé [Composer](https://getcomposer.org/) et [Laravel](https://laravel.com/).

### Étapes d'installation

1. **Ajouter le package via Composer** :

    ```bash
    composer require bui-corporation/bui-payment
    ```

2. **Publier le fichier de configuration** :

    ```bash
    php artisan vendor:publish --provider="Bui\\Payment\\BuiPaymentServiceProvider"
    ```

3. **Ajouter les variables d'environnement** à votre fichier `.env` :

    ```dotenv
    BUI_API_KEY=your_api_key_here
    BUI_BASE_URL=https://api.buicorporation.io/v1.0/
    ```

## Configuration

Après avoir publié le fichier de configuration, vous pouvez le trouver dans `config/buipayment.php`. Vous pouvez y définir vos paramètres par défaut.

## Utilisation

### Obtenir la liste des services

Vous pouvez obtenir la liste des services disponibles en utilisant la façade `BuiPayment` :

```php
use Bui\Payment\Facades\BuiPayment;

$services = BuiPayment::getServices();
use Bui\Payment\Facades\BuiPayment;

## Effectuer un paiement

$paymentData = [
    'paymentMethod' => 'mobile_money',
    'mobileMoney' => [
        'service' => 'PAYIN_ORANGE_CI',
        'amount' => 200,
        'recipient' => '+225XXXXXXXXXX',
        'reference' => 'unique_reference',
        'note' => 'Transaction note',
        'otpCode' => '123456',
    ],
    'customer' => [
        'firstname' => 'John',
        'lastname' => 'Doe',
        'email' => 'john.doe@example.com',
        'externalId' => '123456',
        'phoneNumber' => '+225XXXXXXXXXX'
    ]
];
```

## Vérifier le statut d'un paiement
```php
use Bui\Payment\Facades\BuiPayment;
$status = BuiPayment::getPaymentStatus('payment_id_here');
```
```php
### Effectuer un transfert
use Bui\Payment\Facades\BuiPayment;

$transferData = [
    'transferMethod' => 'mobile_money',
    'mobileMoney' => [
        'service' => 'PAYOUT_ORANGE_CI',
        'amount' => 200,
        'recipient' => '+225XXXXXXXXXX',
        'reference' => 'unique_reference',
        'note' => 'Transaction note'
    ],
    'customer' => [
        'firstname' => 'John',
        'lastname' => 'Doe',
        'email' => 'john.doe@example.com',
        'externalId' => '123456',
        'phoneNumber' => '+225XXXXXXXXXX'
    ]
];
$transfer = BuiPayment::makeTransfer($transferData);
```
## Vérifier le statut d'un transfert
```php
use Bui\Payment\Facades\BuiPayment;

$status = BuiPayment::getTransferStatus('transfer_id_here');
```
## Gérer les portefeuilles

**Obtenir la liste des portefeuilles**
```php
use Bui\Payment\Facades\BuiPayment;

$wallets = BuiPayment::getWallets();
```
**Obtenir le solde d'un portefeuille**
```php
use Bui\Payment\Facades\BuiPayment;

$balance = BuiPayment::getWalletBalance('wallet_id_here');
```
## Effectuer un payin (créditer un portefeuille)
```php
use Bui\Payment\Facades\BuiPayment;

$payinData = [
    'amount' => 1000,
    'walletId' => 'wallet_id_here'
];
$payin = BuiPayment::payin($payinData);
```
## Effectuer un payout (débiter un portefeuille)
```php
use Bui\Payment\Facades\BuiPayment;

$payoutData = [
    'amount' => 500,
    'walletId' => 'wallet_id_here'
];
$payout = BuiPayment::payout($payoutData);
```
### Contributions
Les contributions sont les bienvenues. Pour proposer des améliorations, ouvrez une issue ou soumettez une pull request

### Licence

### Conclusion





