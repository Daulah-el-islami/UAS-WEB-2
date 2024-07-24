<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Broadcast Driver
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default broadcast driver that should be used by
    | the application. The "pusher" driver is a popular choice, but you may
    | also use other drivers such as "redis" or "log".
    |
    */

    'default' => env('BROADCAST_DRIVER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Broadcast Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure the broadcast connections for your application.
    | The connections define how the broadcasting service is provided. You
    | may configure multiple connections for different broadcast drivers.
    |
    */

    'connections' => [

        'pusher' => [
            'driver' => 'pusher',
            'key' => env('PUSHER_APP_KEY'),
            'secret' => env('PUSHER_APP_SECRET'),
            'app_id' => env('PUSHER_APP_ID'),
            'options' => [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => true,
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'broadcasting',
        ],

        'log' => [
            'driver' => 'log',
        ],

    ],

];
