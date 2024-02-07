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
        return $this->pdo->query('
                SELECT id, user_name userName, content, created_at date 
                FROM comments 
                ORDER BY created_at DESC')
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save(string $userName, string $content): array
    {
         $this->pdo->prepare('INSERT INTO comments (user_name,content) VALUES(?, ?)')
            ->execute([$userName, $content]);

         $id = $this->pdo->lastInsertId();

         return $this->getCommentById($id);
    }

    public function delete(int $id): bool
    {
        return $this->pdo->prepare('DELETE FROM comments WHERE id = ?')->execute([$id]);
    }

    private function getCommentById(int $id):array
    {
        return $this->pdo->query("
                SELECT id, user_name userName, content, created_at date 
                FROM comments 
                WHERE id = $id")
            ->fetch(PDO::FETCH_ASSOC);
    }
}