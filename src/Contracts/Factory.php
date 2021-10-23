<?php

namespace Revolution\PayPay\Contracts;

use PayPay\OpenPaymentAPI\Client;

interface Factory
{
    /**
     * @param  callable|Client  $client
     * @return Factory
     */
    public function clientUsing($client): Factory;

    /**
     * @return Client
     */
    public function client(): Client;
}
