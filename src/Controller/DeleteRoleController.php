<?php

namespace App\Controller;

use App\Services\DeleteRoleServices;
require __DIR__ . '/../../vendor/autoload.php';
readonly class DeleteRoleController
{
    public function __construct(
        private DeleteRoleServices $deleteRoleServices
    )
    {}

    /**
     * @throws \Exception
     */
    public function deleteRole($username, $role):void
    {
        $this->deleteRoleServices->DeleteRole($username, $role);
    }
}
$name = htmlspecialchars(strip_tags(trim($_POST['username'])));
$role = htmlspecialchars(strip_tags(trim($_POST['role'])));
$deleteRoleController = new DeleteRoleController(new DeleteRoleServices());
try {
    $deleteRoleController->deleteRole($name, $role);
    echo "User role successfully deleted.";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() .". Code: ". $e->getCode();
}