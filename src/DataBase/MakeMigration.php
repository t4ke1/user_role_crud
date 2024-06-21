<?php

require __DIR__.'/../../vendor/autoload.php';

use App\DataBase\CreateTable;
use App\DataBase\InsertTable;


$migration = new CreateTable();
try {
    $migration->createAllTables();
} catch (Exception $e) {
}

$insert = new InsertTable();
try {
    $insert->insertData();
} catch (Exception $e) {
}
echo "Миграция выполнена успешно!\n";