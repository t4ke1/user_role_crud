<?php

namespace App\Exception;

class LastRoleException extends \Exception
{
    public function __construct(string $message = 'User cant be without role', int $code = 404, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}