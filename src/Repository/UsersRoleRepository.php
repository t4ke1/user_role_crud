<?php

namespace App\Repository;



use App\DataBase\DbConnection;
use App\Entity\UsersRole;
use PDOException;


class UsersRoleRepository
{
    /**
     * @throws \Exception
     */
    public function saveUsersRole(UsersRole $usersRole): void
    {
        $db = new DbConnection();
        $pdo = $db->getConnection();
        $userId = $usersRole->getUserId();
        $roleId = $usersRole->getRoleId();
        $pdo->exec("INSERT INTO user_role (user_id, role_id) VALUES ($userId, $roleId)");
    }

    /**
     * @throws \Exception
     */
    public function getAllUsersRole(): array
    {
        $db = new DbConnection();
        $pdo = $db->getConnection();
        $stmt = $pdo->prepare("
            SELECT users.name AS user_name, available_role.role AS user_role
            FROM users
            LEFT JOIN user_role ON users.id = user_role.user_id
            LEFT JOIN available_role ON user_role.role_id = available_role.id
        ");
        $stmt->execute();
        return $stmt->fetchAll();

    }

    /**
     * @throws \Exception
     */
    public function deleteUserRole(int $userId): void
    {
        $db = new DbConnection();
        $pdo = $db->getConnection();
        $stmt = $pdo->prepare("DELETE FROM user_role WHERE user_id = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }

    /**
     * @throws \Exception
     */
    public function addRole(int $userId, int $roleId):void
    {
        $db = new DbConnection();
        $pdo = $db->getConnection();
        $stmt = $pdo->prepare("INSERT INTO user_role (user_id, role_id) VALUES (:userId, :roleId)");
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':roleId', $roleId);
        $stmt->execute();
    }

    public function deleteRole(int $userId, int $roleId): void
    {
        $db = new DbConnection();
        $pdo = $db->getConnection();
        $stmt = $pdo->prepare("DELETE FROM user_role WHERE user_id = :userId AND role_id = :roleId");
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':roleId', $roleId);
        $stmt->execute();
    }
    /**
     * @throws \Exception
     */
    public function changeRole(int $userId, int $currentRoleId, int $changeRoleId): void
    {
        $db = new DbConnection();
        $pdo = $db->getConnection();
        $stmt = $pdo->prepare("UPDATE user_role SET role_id = :changeRoleId, updated_at = NOW() WHERE user_id = :userId AND role_id = :currentRoleId");
        $stmt->bindParam(':changeRoleId', $changeRoleId);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':currentRoleId', $currentRoleId);
        $stmt->execute();
    }

    /**
     * @throws \Exception
     */
    public function checkUserRole(int $userId, int $currentRoleId): bool
    {
        $db = new DbConnection();
        $pdo = $db->getConnection();
        $stmt = $pdo->prepare("SELECT role_id FROM user_role WHERE user_id = :userId AND role_id = :currentRoleId");
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':currentRoleId', $currentRoleId);
        $stmt->execute();
        if ($stmt->fetch()) {
            return true;
        }
        return false;
    }

    /**
     * @throws \Exception
     */
    public function checkUserLastRole(int $userId):bool
    {
        $db = new DbConnection();
        $pdo = $db->getConnection();
        $stmt = $pdo->prepare("SELECT COUNT(*) as role_count FROM user_role WHERE user_id = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if ($count > 1) {
            return true;
        }
        return false;
    }

}