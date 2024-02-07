<?php

namespace App\Action;

use App\Repositoty\CommentRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DeleteCommentAction
{
    private CommentRepository $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }
    public function __invoke(Request $request, Response $response): Response
    {
        $id = (int)$request->getParsedBody()['id'];

        $status = $this->repository->delete($id);
        $response->getBody()->write(json_encode($status));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }

}