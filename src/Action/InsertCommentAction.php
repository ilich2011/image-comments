<?php

namespace App\Action;

use App\Repositoty\CommentRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class InsertCommentAction
{
    private CommentRepository $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $status = $this->repository->save($request->getParsedBody()['userName'], $request->getParsedBody()['content']);
        $response->getBody()->write(json_encode($status));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }

}