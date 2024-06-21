<?php

namespace App\Services;

require __DIR__ . '/../../vendor/autoload.php';


use App\Entity\AvailableRole;
use App\Entity\Users;
use App\Exception\RoleNotFoundException;
use App\Exception\UserNotFoundException;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use App\Repository\UsersRoleRepository;

class ChangeRoleServices
{
    /**
     * @throws \Exception
     */
    public function ChangeRole(string $name, string $currentRole, string $changeRole):bool
    {

        $user = new Users();
        $user->setUsername($name);
        $userRepository = new UserRepository();
        if (!$userRepository->checkName($user)){
            return throw new UserNotFoundException();
        }
        $userId = $userRepository->findUserIdByName($user);

        $currentRoleEntity = new AvailableRole();
        $currentRoleEntity->setRole($currentRole);
        $CurrentRoleRepository = new RoleRepository();
        $currentRoleId = $CurrentRoleRepository->findRoleIdByRole($currentRoleEntity);

        $ChangeRoleEntity = new AvailableRole();
        $ChangeRoleEntity->setRole($changeRole);
        $ChangeRoleRepository = new RoleRepository();
        $changeRoleId = $ChangeRoleRepository->findRoleIdByRole($ChangeRoleEntity);

        $userRoleRepository = new UsersRoleRepository();
        if (!$userRoleRepository->checkUserRole($userId, $currentRoleId)){
            return throw new RoleNotFoundException();
        }

        $userRoleRepository->changeRole($userId, $currentRoleId, $changeRoleId);

        return true;
    }
}