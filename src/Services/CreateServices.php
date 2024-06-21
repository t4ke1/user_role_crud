<?php

namespace App\Services;

require __DIR__ . '/../../vendor/autoload.php';

use App\Entity\AvailableRole;
use App\Entity\Users;
use App\Entity\UsersRole;
use App\Exception\DuplicateUserException;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use App\Repository\UsersRoleRepository;


class CreateServices
{

    /**
     * @throws \Exception
     */
    public function createUser(string $name, string $role): bool
    {

        $User = new Users();
        $User->setUsername($name);

        $UserRepository = new UserRepository();
        if ($UserRepository->checkName($User)){
            return throw new DuplicateUserException();
        }

        $UserRepository->saveName($User);

        $userRole = new AvailableRole();
        $userRole->setRole($role);

        $RoleRepository = new RoleRepository();
        $roleId = $RoleRepository->findRoleIdByRole($userRole);
        $userId = $UserRepository->findUserIdByName($User);

        $userRole = new UsersRole();
        $userRole
            ->setUserId($userId)
            ->setRoleId($roleId);

        $UserRoleRepository = new UsersRoleRepository();
        $UserRoleRepository->saveUsersRole($userRole);

        return true;
    }
}