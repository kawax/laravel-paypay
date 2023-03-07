<?php

namespace Revolution\PayPay;

use Illuminate\Support\Traits\Macroable;
use PayPay\OpenPaymentAPI\Client;
use Revolution\PayPay\Contracts\Factory;

class PayPayClient implements Factory
{
    use Macroable {
        __call as macroCall;
    }

    public function __construct(protected Client $client)
    {
        //
    }

    public function clientUsing(callable|Client $client): static
    {
        $this->client = is_callable($client) ? call_user_func($client) : $client;

        return $this;
    }

    public function client(): Client
    {
        return $this->client;
    }

    public function __call($method, array $parameters): mixed
    {
        if (isset($this->client->$method)) {
            return $this->client->$method;
        }

        return $this->macroCall($method, $parameters);
    }
}
