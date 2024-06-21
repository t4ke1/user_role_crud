<?php

namespace App\Entity;

class Users
{
    private string $name;

    public function setUsername($name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }
}