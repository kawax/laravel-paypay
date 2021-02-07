# Laravel PayPay

Simple integration Laravel and PayPay API.

https://developer.paypay.ne.jp/

## Requirements
- PHP >= 7.3
- Laravel >= 6.0

## Versioning
- Basic : semver
- Drop old PHP or Laravel version : `+0.1`. composer should handle it well.
- Support only latest major version (`master` branch), but you can PR to old branches.

## Installation

```
composer require revolution/laravel-paypay
```

## Configuration

.env
```
PAYPAY_PRODUCTION=false
PAYPAY_API_KEY=
PAYPAY_API_SECRET=
PAYPAY_MERCHANT_ID=
PAYPAY_CURRENCY=JPY
```

## Usage
Magic method returns the corresponding controller class.

```php
use Revolution\PayPay\Facades\PayPay;

// PayPay\OpenPaymentAPI\Controller\Code
$code = PayPay::code();

// PayPay\OpenPaymentAPI\Controller\Payment
$payment = PayPay::payment();

// PayPay\OpenPaymentAPI\Controller\Refund
$refund = PayPay::refund();
```

```php
use Revolution\PayPay\Facades\PayPay;
use PayPay\OpenPaymentAPI\Models\CreateQrCodePayload;

$payload = new CreateQrCodePayload();
// ...

$response = PayPay::code()->createQRCode($payload);

// ...
```

Testing
```php
use Revolution\PayPay\Facades\PayPay;

PayPay::shouldReceive('code->createQRCode')->once()->andReturn([]);
```

## LICENSE
MIT
