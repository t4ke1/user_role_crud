<?php

namespace App\Repository;

use App\DataBase\DbConnection;
use App\Entity\AvailableRole;

class RoleRepository
{
    /**
     * @throws \Exception
     */
    public function findRoleIdByRole(AvailableRole $role): int
    {
        $db = new DbConnection();
        $pdo = $db->getConnection();
        $userRole = $role->getRole();
        $stmt = $pdo->prepare("SELECT id FROM available_role WHERE role = :userRole");
        $stmt->bindParam(':userRole', $userRole);
        $stmt->execute();
        return $stmt->fetchColumn();

    }
}