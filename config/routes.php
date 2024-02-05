<?php

use App\Action\InsertCommentAction;
use App\Action\MainAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response, $args) {
        $response->getBody()->write("Hello world!");
        return $response;
    });

    $app->get('/get-all',MainAction::class);

    $app->post('/save-comment', InsertCommentAction::class);
};
