<?php

namespace App\Controller;

require __DIR__ . '/../../vendor/autoload.php';

use App\Services\ReadServices;

readonly class ReadController
{
    public function __construct(
        private ReadServices $read
    )
    {}

    /**
     * @throws \Exception
     */
    public function showAllUsers(): array
    {
        return $this->read->ShowAllUsers();
    }
}

$userData = new ReadServices();
$readController = new ReadController($userData);
try {
    $results = ($readController->showAllUsers());
} catch (\Exception $e) {
}

$output = [];
$temp = [];

// Пройдемся по каждому элементу входного массива
foreach ($results as $entry) {
    $name = $entry['user_name'];
    $role = $entry['user_role'];


    if (isset($temp[$name])) {
        if (!isset($temp[$name]['role2'])) {
            $temp[$name]['role2'] = $role;
        } else {
            $i = 3;
            while (isset($temp[$name]['role' . $i])) {
                $i++;
            }
            $temp[$name]['role' . $i] = $role;
        }
    } else {
        $temp[$name] = [
            'name' => $name,
            'role' => $role,
        ];
    }
}

foreach ($temp as $entry) {
    $output[] = $entry;
}

print_r($output);
