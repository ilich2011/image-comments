<?php

use Monolog\Level;

$settings = [
    'logger' => [
        'name' => 'error',
        'file' => __DIR__ . '/../logs/error.log',
        'level' => Level::Error,
        'maxFiles' => 10,
    ],
    'PDO' =>[
        'dsn' => "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}",
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ],
];

return $settings;
