<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'userAuth'), // default to 'userAuth' explicitly
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    'guards' => [
        'customerAuth' => [
            'driver' => 'session',
            'provider' => 'customers',
        ],

        'userAuth' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'customers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Customer::class,
        ],

        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],

        'customers' => [
            'provider' => 'customers',
            'table' => env('AUTH_CUSTOMER_PASSWORD_RESET_TOKEN_TABLE', 'customer_password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
