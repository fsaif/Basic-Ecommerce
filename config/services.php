<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '462503200911011',
        'client_secret' => 'ec7f260abb1abb0062dc77510cc14816',
        'redirect' => 'http://localhost:8000/en/auth/signin/facebook/callback',
    ],

    'google' => [
        'client_id' => '919682024309-pi57ovakpull15qs4u28j5endmm012ga.apps.googleusercontent.com',
        'client_secret' => 'M8a2pNxeiCllcQT91dB2niHF',
        'redirect' => 'http://localhost:8000/en/auth/signin/google/callback',
    ],

    'twitter' => [
        'client_id' => '',
        'client_secret' => '',
        'redirect' => 'http://localhost:8000/en/auth/signin/twitter/callback',
    ],

];
