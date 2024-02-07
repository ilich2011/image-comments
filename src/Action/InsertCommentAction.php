<?php

namespace App\Action;

use App\Repositoty\CommentRepository;
use App\Validator\InsertRequestValidator;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class InsertCommentAction
{
    private CommentRepository $repository;
    private InsertRequestValidator $validator;

    public function __construct(CommentRepository $repository, InsertRequestValidator $validator)
    {
        $this->validator = $validator;
        $this->repository = $repository;
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $body = $request->getParsedBody();

        if (!$this->validator->validateRequest($body)) {
            $response->getBody()->write('invalid data');
            return $response->withStatus(500);
        }

        $comment = $this->repository->save($body['userName'], $body['content']);
        $response->getBody()->write(json_encode($comment));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }

}