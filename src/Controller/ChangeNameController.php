<?php

namespace App\Controller;

require __DIR__ . '/../../vendor/autoload.php';

use App\Services\ChangeNameServices;

readonly class ChangeNameController
{
    public function __construct(
        private ChangeNameServices $changeNameServices
    )
    {}

    /**
     * @throws \Exception
     */
    public function ChangeName(string $name, string $changeName): bool
    {
        $this->changeNameServices->changeName($name, $changeName);
        return true;
    }
}

$name = htmlspecialchars(strip_tags(trim($_POST['username'])));
$changeName = htmlspecialchars(strip_tags(trim($_POST['changeName'])));
$changeNameServices = new ChangeNameServices();
$changeNameController = new ChangeNameController($changeNameServices);
try {
    $changeNameController->ChangeName($name, $changeName);
    echo "User name successfully changed.";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() .". Code: ". $e->getCode();
}