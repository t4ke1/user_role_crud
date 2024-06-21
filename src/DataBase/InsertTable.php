<?php

namespace App\DataBase;

class InsertTable
{
    /**
     * @throws \Exception
     */
    public function insertData(): void
    {
        $db = new DbConnection();
        $pdo = $db->getConnection();
        $pdo->exec("INSERT INTO available_role (role) VALUES ('role1'), ('role2'), ('role3')");
    }
}