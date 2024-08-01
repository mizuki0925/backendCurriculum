<?php

namespace App\Exceptions;

use Exception;

class AccountInvalidException extends Exception
{
    public function __construct($message = "The provided variable is not a valid Account model.", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
