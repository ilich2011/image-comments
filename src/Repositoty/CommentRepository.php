<?php

namespace App\Repositoty;

use PDO;

class CommentRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll(): array
    {
        return $this->pdo->query('SELECT * FROM comments ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save(string $userName, string $content): bool
    {
        return $this->pdo->prepare('INSERT INTO comments (user_name,content) VALUES(?, ?)')
            ->execute([$userName, $content]);
    }
}