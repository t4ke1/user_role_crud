<?php

namespace App\Controller;


require __DIR__ . '/../../vendor/autoload.php';

use App\Services\CreateServices;


readonly class CreateController
{
    public function __construct(
        private CreateServices $create
    )
    {}
    /**
     * @throws \Exception
     */
    public function createUser(string $name, string $role): bool
    {
        return $this->create->createUser($name, $role);
    }

}

$name = htmlspecialchars(strip_tags(trim($_POST['username'])));
$role = htmlspecialchars(strip_tags(trim($_POST['role'])));
$createServices = new CreateServices();
$createController = new CreateController($createServices);

try {
    $createController->createUser($name, $role);
    echo "User successfully created.";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() .". Code: ". $e->getCode();
}