<?php

use Monolog\Formatter\LineFormatter;
use Monolog\Formatter\NormalizerFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\App;
use Slim\Factory\AppFactory;

return [
    'settings' => function () {
        return require __DIR__ . '/settings.php';
    },

    App::class => function (ContainerInterface $container) {
        return AppFactory::createFromContainer($container);
    },

    LoggerInterface::class => function (ContainerInterface $container) {
        $loggerSettings = $container->get('settings')['logger'];

        $logger = new Logger($loggerSettings['name']);

        $handler = new RotatingFileHandler(
            $loggerSettings['file'],
            $loggerSettings['maxFiles'],
            $loggerSettings['level']
        );

        $formatter = new LineFormatter(
            LineFormatter::SIMPLE_FORMAT . PHP_EOL,
            NormalizerFormatter::SIMPLE_DATE,
            true,
            true
        );
        $handler->setFormatter($formatter);
        $logger->pushHandler($handler);

        return $logger;
    },
];
