<?php

namespace App\Exception;

class DuplicateUserException extends \Exception
{
    public function __construct(string $message = 'User with this name already exists', int $code = 409, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}