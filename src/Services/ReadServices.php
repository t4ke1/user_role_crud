<?php

namespace App\Services;

use App\Repository\UsersRoleRepository;

class ReadServices
{
    /**
     * @throws \Exception
     */
    public function ShowAllUsers(): array
{

    $usersRoleRepository = new UsersRoleRepository();
    return $usersRoleRepository->getAllUsersRole();
}
}