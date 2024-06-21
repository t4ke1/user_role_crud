<?php

namespace App\Exception;

class RoleNotFoundException extends \Exception
{
    public function __construct(string $message = 'This user not have this role', int $code = 404, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}