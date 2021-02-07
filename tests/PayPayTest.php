<?php

namespace Tests;

use Mockery as m;
use PayPay\OpenPaymentAPI\Client;
use PayPay\OpenPaymentAPI\Controller\Code;
use PayPay\OpenPaymentAPI\Controller\Payment;
use Revolution\PayPay\Contracts\Factory;
use Revolution\PayPay\Facades\PayPay;
use Revolution\PayPay\PayPayClient;

class PayPayTest extends TestCase
{
    public function testInstance()
    {
        $client = new PayPayClient(m::mock(Client::class));

        $this->assertInstanceOf(PayPayClient::class, $client);
    }

    public function testContainer()
    {
        $client = app(Factory::class);

        $this->assertInstanceOf(PayPayClient::class, $client);
    }

    public function testClientUsing()
    {
        $mock = m::mock(Client::class);

        $client = PayPay::clientUsing($mock);

        $this->assertEquals($client->client(), $mock);
        $this->assertInstanceOf(Client::class, $client->client());
    }

    public function testClientUsingCallable()
    {
        $client = PayPay::clientUsing(function () {
            return m::mock(Client::class);
        });

        $this->assertInstanceOf(Client::class, $client->client());
    }

    public function testCodeController()
    {
        $code = PayPay::code();

        $this->assertNotNull($code);
        $this->assertInstanceOf(Code::class, $code);
    }

    public function testPaymentController()
    {
        $payment = PayPay::payment();

        $this->assertNotNull($payment);
        $this->assertInstanceOf(Payment::class, $payment);
    }

    public function testBadMethodCall()
    {
        $this->expectException(\BadMethodCallException::class);

        PayPay::test();
    }
}
