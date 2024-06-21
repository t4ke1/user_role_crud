<?php

namespace App\Controller;

use App\Services\AddRoleServices;

require __DIR__ . '/../../vendor/autoload.php';
readonly class AddRoleController
{

    public function __construct(
        private AddRoleServices $addRoleServices
    )
    {}

    /**
     * @throws \Exception
     */
    public function addRole(string $name, string $role): void
    {
        $this->addRoleServices->addRole($name, $role);

    }
}
$name = htmlspecialchars(strip_tags(trim($_POST['username'])));
$role = htmlspecialchars(strip_tags(trim($_POST['role'])));
$addRoleServices = new AddRoleServices();
$addRoleController = new AddRoleController($addRoleServices);
try {
    $addRoleController->addRole($name, $role);
    echo "User role successfully added.";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() .". Code: ". $e->getCode();
}
