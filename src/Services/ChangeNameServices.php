<?php

namespace App\Services;

use App\Entity\Users;
use App\Exception\DuplicateUserException;
use App\Repository\UserRepository;

require __DIR__ . '/../../vendor/autoload.php';
class ChangeNameServices
{
    /**
     * @throws \Exception
     */
    public function changeName(string $name, string $changeName): bool
    {
        $user = new Users();
        $user->setUsername($name);
        $userRepository = new UserRepository();
        if (!$userRepository->checkName($user)){
            return throw new DuplicateUserException();
        }
        $userId = $userRepository->findUserIdByName($user);

        $userRepository = new UserRepository();
        $userRepository->changeName($userId, $changeName);

        return true;
    }
}