<?php

return [
    // Production mode
    // false, true, "test", "perfMode"
    'production' => env('PAYPAY_PRODUCTION', false),

    // API KEY
    'api_key' => env('PAYPAY_API_KEY'),

    // API SECRET
    'api_secret' => env('PAYPAY_API_SECRET'),

    // Merchant ID
    'merchant_id' => env('PAYPAY_MERCHANT_ID'),

    // Currency
    'currency' => env('PAYPAY_CURRENCY', 'JPY'),
];
