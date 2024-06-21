<?php

namespace App\Repository;

use App\DataBase\DbConnection;
use App\Entity\Users;

class UserRepository
{
    /**
     * @throws \Exception
     */
    public function saveName(Users $user): void
    {
        $db = new DbConnection();
        $pdo = $db->getConnection();
        $name = $user->getname();
        $pdo->exec("INSERT INTO users (name) VALUES ('$name')");
    }

    /**
     * @throws \Exception
     */
    public function findUserIdByName(Users $user): int
    {
        $db = new DbConnection();
        $pdo = $db->getConnection();
        $userName = $user->getName();
        $stmt = $pdo->prepare("SELECT id FROM users WHERE name = :userName");
        $stmt->bindParam(':userName', $userName);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    /**
     * @throws \Exception
     */
    public function deleteUser(string $name): void
    {
        $db = new DbConnection();
        $pdo = $db->getConnection();
        $stmt = $pdo->prepare("DELETE FROM users WHERE name = :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }

    /**
     * @throws \Exception
     */
    public function changeName(int $userId, string $changeName): void
    {
        $db = new DbConnection();
        $pdo = $db->getConnection();
        $stmt = $pdo->prepare("UPDATE users SET name = :changeName,updated_at = NOW() WHERE id = :userId");
        $stmt->bindParam(':changeName', $changeName);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }

    /**
     * @throws \Exception
     */
    public function checkName(Users $user): bool
    {
        $db = new DbConnection();
        $pdo = $db->getConnection();
        $name = $user->getName();
        $stmt = $pdo->prepare("SELECT name FROM users WHERE name = :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        if ($stmt->fetch()) {
            return true;
        }
        return false;
    }
}