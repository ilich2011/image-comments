<?php

use DI\ContainerBuilder;
use Slim\App;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Build DI container instance
$container = (new ContainerBuilder())
    ->addDefinitions(__DIR__ . '/container.php')
    ->build();

// Create App instance
$app = $container->get(App::class);

(require_once __DIR__ . '/routes.php')($app);

(require_once __DIR__ . '/middleware.php')($app);

return $app;
