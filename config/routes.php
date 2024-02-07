<?php

use App\Action\DeleteCommentAction;
use App\Action\InsertCommentAction;
use App\Action\MainAction;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {

    $app->group('/api', function (RouteCollectorProxy $group) {

        $group->get('/get-all',MainAction::class);

        $group->post('/save-comment', InsertCommentAction::class);

        $group->delete('/delete-comment', DeleteCommentAction::class);

    });

};
