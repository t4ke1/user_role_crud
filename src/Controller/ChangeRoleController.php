<?php

namespace App\Controller;

require __DIR__ . '/../../vendor/autoload.php';

use App\Services\ChangeRoleServices;

readonly class ChangeRoleController
{
    public function __construct(
        private ChangeRoleServices $changeRoleServices
    )
    {}

    /**
     * @throws \Exception
     */
    public function ChangeRole(string $name, string $currentRole, string $changeRole): bool
    {
        $this->changeRoleServices->ChangeRole($name, $currentRole, $changeRole);
        return true;
    }
}
$name = htmlspecialchars(strip_tags(trim($_POST['username'])));
$currentRole = htmlspecialchars(strip_tags(trim($_POST['currentRole'])));
$changeRole = htmlspecialchars(strip_tags(trim($_POST['changeRole'])));
$changeRoleServices = new ChangeRoleServices();
$changeRoleController = new ChangeRoleController($changeRoleServices);

try {
    $changeRoleController->ChangeRole($name, $currentRole, $changeRole);
    echo "User role successfully changed.";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() .". Code: ". $e->getCode();
}