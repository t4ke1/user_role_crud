<?php

namespace App\Exception;

class DuplicateRoleException extends \Exception
{
    public function __construct(string $message = 'This user already has this role', int $code = 409, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}