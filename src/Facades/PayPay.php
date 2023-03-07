<?php

namespace Revolution\PayPay\Facades;

use Illuminate\Support\Facades\Facade;
use PayPay\OpenPaymentAPI\Client;
use PayPay\OpenPaymentAPI\Controller\CashBack;
use PayPay\OpenPaymentAPI\Controller\Code;
use PayPay\OpenPaymentAPI\Controller\Payment;
use PayPay\OpenPaymentAPI\Controller\Refund;
use PayPay\OpenPaymentAPI\Controller\User;
use PayPay\OpenPaymentAPI\Controller\Wallet;
use Revolution\PayPay\Contracts\Factory;

/**
 * @method static Client client()
 * @method static static clientUsing(callable|Client $client)
 * @method static Code code()
 * @method static Payment payment()
 * @method static Refund refund()
 * @method static User user()
 * @method static Wallet wallet()
 * @method static CashBack cashback()
 */
class PayPay extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return Factory::class;
    }
}
