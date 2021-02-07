<?php

namespace Revolution\PayPay;

use BadMethodCallException;
use Exception;
use PayPay\OpenPaymentAPI\Client;
use Revolution\PayPay\Contracts\Factory;

class PayPayClient implements Factory
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param  callable|Client  $client
     *
     * @return Factory
     */
    public function clientUsing($client): Factory
    {
        $this->client = is_callable($client) ? call_user_func($client) : $client;

        return $this;
    }

    /**
     * @return Client
     */
    public function client(): Client
    {
        return $this->client;
    }

    /**
     * @param  string  $method
     * @param  array  $parameters
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        try {
            return $this->client->$method;
        } catch (Exception $e) {
            throw new BadMethodCallException(sprintf(
                'Method %s::%s does not exist.', static::class, $method
            ));
        }
    }
}
