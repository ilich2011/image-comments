<?php

namespace App\Repositoty;

use PDO;

class CommentRepository
{
    private PDO $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAll():array
    {
        $comments = $this->pdo->query( "SELECT * FROM comments ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
    }
}