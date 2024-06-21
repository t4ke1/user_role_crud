<?php

namespace App\Controller;

require __DIR__ . '/../../vendor/autoload.php';

use App\Services\DeleteServices;
readonly class DeleteController
{
    public function __construct(
        private DeleteServices $delete
    )
    {}

    public function deleteUser($name): void
    {
        $this->delete->DeleteUser($name);
    }
}

$name = htmlspecialchars(strip_tags(trim($_POST['username'])));
$deleteServices = new DeleteServices();
$deleteController = new DeleteController($deleteServices);
try {
    $deleteController->deleteUser($name);
    echo "User successfully deleted.";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() .". Code: ". $e->getCode();
}