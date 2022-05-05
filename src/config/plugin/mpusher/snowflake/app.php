<?php
return [
    'enable' => true,
    'snowflake' => [
        'start_time' => strtotime('Y-m-d') * 1000,
        'redis' => [
            'host'   => '',
            'port'   => 6379,
            'password' => '',
            'select' => 0,
        ],
    ],
];