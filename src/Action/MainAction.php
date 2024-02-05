<?php

namespace App\Action;

use App\Repositoty\CommentRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class MainAction
{
    private CommentRepository $repository;
    public function __construct(CommentRepository $repository) {
        $this->repository = $repository;
    }
    public function __invoke(Request $request, Response $response): Response
    {
        $comments = $this->repository->getAll();
        $response->getBody()->write(json_encode($comments));
        return $response->withHeader('Content-Type', 'application/json');
    }
}