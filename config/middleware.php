<?php

use Psr\Log\LoggerInterface;
use Slim\App;

return function (App $app) {
    $app->addRoutingMiddleware();

    $app->addErrorMiddleware(
        ($_ENV['ENV'] === 'DEV'),
        true,
        true,
        $app->getContainer()->get(LoggerInterface::class)
    );

    $app->addBodyParsingMiddleware();
};
