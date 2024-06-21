<?php

namespace App\Entity;

class AvailableRole
{
    private string $role;

    public function setRole($role): self
    {
        $this->role = $role;
        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }
}