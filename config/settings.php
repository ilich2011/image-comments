<?php

use Monolog\Level;

$settings = [
    'logger' => [
        'name' => 'error',
        'file' => __DIR__ . '/../logs/error.log',
        'level' => Level::Error,
        'maxFiles' => 10,
    ],
];

return $settings;
