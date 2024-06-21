<?php

namespace App\Services;

require __DIR__ . '/../../vendor/autoload.php';

use App\Entity\AvailableRole;
use App\Entity\Users;
use App\Exception\DuplicateRoleException;
use App\Exception\UserNotFoundException;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use App\Repository\UsersRoleRepository;

class AddRoleServices
{
    /**
     * @throws \Exception
     */
    public function addRole(string $name, string $role): bool
    {
        $user = new Users();
        $user->setUsername($name);
        $userRepository = new UserRepository();
        if (!$userRepository->checkName($user)){
            return throw new UserNotFoundException();
        }
        $userId = $userRepository->findUserIdByName($user);

        $roleEntity = new AvailableRole();
        $roleEntity->setRole($role);

        $roleRepository = new RoleRepository();
        $roleId = $roleRepository->findRoleIdByRole($roleEntity);

        $usersRoleRepository = new UsersRoleRepository();

        if ($usersRoleRepository->checkUserRole($userId, $roleId)){
            return throw new DuplicateRoleException();
        }
        $usersRoleRepository->addRole($userId, $roleId);

        return true;
    }

}