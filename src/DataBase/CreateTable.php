<?php

namespace App\DataBase;

use App\Migration\Migration;

class CreateTable
{
    /**
     * @throws \Exception
     */
    public function createAllTables(): void
    {
        $db = new DbConnection();
        $pdo = $db->getConnection();
        $pdo->exec(Migration::createTableUsers());
        $pdo->exec(Migration::createTableAvailableRoles());
        $pdo->exec(Migration::createTableUserRole());
    }
}
