<?php

namespace Revolution\PayPay\Contracts;

use PayPay\OpenPaymentAPI\Client;

interface Factory
{
    public function clientUsing($client): Factory;

    public function client(): Client;

}
