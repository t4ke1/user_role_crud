<?php

namespace App\Services;

require __DIR__ . '/../../vendor/autoload.php';

use App\Entity\AvailableRole;
use App\Entity\Users;
use App\Exception\LastRoleException;
use App\Exception\RoleNotFoundException;
use App\Exception\UserNotFoundException;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use App\Repository\UsersRoleRepository;

class DeleteRoleServices
{
    /**
     * @throws \Exception
     */
    public function DeleteRole(string $name, string $role): void
    {
        $user = new Users();
        $user->setUsername($name);
        $userRepository = new UserRepository();
        if (!$userRepository->checkName($user)){
            throw new UserNotFoundException();
        }
        $userId = $userRepository->findUserIdByName($user);

        $roleEntity = new AvailableRole();
        $roleEntity->setRole($role);

        $roleRepository = new RoleRepository();
        $roleId = $roleRepository->findRoleIdByRole($roleEntity);

        $usersRoleRepository = new UsersRoleRepository();
        if (!$usersRoleRepository->checkUserRole($userId, $roleId)){
            throw new RoleNotFoundException();
        }
        if (!$usersRoleRepository->checkUserLastRole($userId)){
            throw new LastRoleException();
        }
        $usersRoleRepository->deleteRole($userId, $roleId);
    }
}