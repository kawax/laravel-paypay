<?php

namespace Revolution\PayPay;

use Illuminate\Support\ServiceProvider;
use PayPay\OpenPaymentAPI\Client;
use Revolution\PayPay\Contracts\Factory;

class PayPayServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(Factory::class, function () {
            return new PayPayClient(
                new Client([
                    'API_KEY'     => config('paypay.api_key'),
                    'API_SECRET'  => config('paypay.api_secret'),
                    'MERCHANT_ID' => config('paypay.merchant_id'),
                ], config('paypay.production', false))
            );
        });

        if (! $this->app->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__.'/../config/paypay.php', 'paypay');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
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
