<?php

namespace App\Services;

require __DIR__ . '/../../vendor/autoload.php';

use App\Entity\Users;
use App\Exception\UserNotFoundException;
use App\Repository\UserRepository;
use App\Repository\UsersRoleRepository;

class DeleteServices
{
    /**
     * @throws UserNotFoundException
     * @throws \Exception
     */
    public function DeleteUser($name):void
    {
        $user = new Users();
        $user->setUsername($name);
        $userRepository = new UserRepository();
        if (!$userRepository->checkName($user)){
            throw new UserNotFoundException();
        }
        $userId = $userRepository->findUserIdByName($user);

        $userRoleRepository = new UsersRoleRepository();
        $userRoleRepository->deleteUserRole($userId);


        $userRepository = new UserRepository();
        $userRepository->deleteUser($name);
    }
}