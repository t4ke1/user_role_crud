<?php

namespace App\Entity;

class UsersRole
{

    private int $userId;
    private int $roleId;

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }
    public function getUserId(): int
    {
        return $this->userId;
    }
    public function setRoleId(int $roleId): self
    {
        $this->roleId = $roleId;
        return $this;
    }
    public function getRoleId(): int
    {
        return $this->roleId;
    }
}