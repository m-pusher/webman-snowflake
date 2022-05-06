<?php
return [
    'enable' => true,
    'snowflake' => [
        'date_center_id' => '',
        'start_time' => strtotime('Y-m-d') * 1000,
        'redis' => [
            'host'   => '',
            'port'   => 6379,
            'password' => '',
            'select' => 0,
        ],
    ],
];