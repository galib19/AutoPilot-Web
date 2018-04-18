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

    'fcm' => [
        'key' => 'AAAAEu-j-tM:APA91bGysVtl5leT6CZ8aqTROw-r1OoqxtbADnIgzQL12W_IZI8zQKztdOw-wlo3j1PWDjE2ZPMQl_093d2RSgXMZtjgBOOOMmjQlx0bMxeJSQcwu3KGNFyG0pO__TmtUYHei_s46Lst'
     ],

];
