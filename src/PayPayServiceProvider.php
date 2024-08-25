<?php

namespace Revolution\PayPay;

use Illuminate\Support\ServiceProvider;
use PayPay\OpenPaymentAPI\Client;
use Revolution\PayPay\Contracts\Factory;

class PayPayServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->scoped(Factory::class, function () {
            return new PayPayClient(
                new Client([
                    'API_KEY' => config('paypay.api_key'),
                    'API_SECRET' => config('paypay.api_secret'),
                    'MERCHANT_ID' => config('paypay.merchant_id'),
                ], config('paypay.production', false)),
            );
        });

        $this->mergeConfigFrom(__DIR__.'/../config/paypay.php', 'paypay');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/paypay.php' => config_path('paypay.php'),
            ], 'paypay-config');
        }
    }
}
