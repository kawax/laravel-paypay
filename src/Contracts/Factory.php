<?php

namespace Revolution\PayPay\Contracts;

use PayPay\OpenPaymentAPI\Client;

interface Factory
{
    public function clientUsing(callable|Client $client): static;

    public function client(): Client;
}
