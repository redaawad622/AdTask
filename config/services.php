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
        'region' => 'us-east-1',
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
        'client_id' => '1627325270681957
',
        'client_secret' => '0b60639bee41e538ad54147edb7d0b83',
        'redirect' => 'http://localhost:8000/login/facebookCallback',
    ],
'github' => [
        'client_id' => '8723c6c9195a5e53f046',

        'client_secret' => '3843493d68f46d19c1c4c096d4d4297ca5636b53',
        'redirect' => 'http://localhost:8000/login/githubCallback',
    ],

];
