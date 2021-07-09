<?php

declare(strict_types=1);

namespace App\Domain\Exception;

use App\Domain\ValueObject\Cpf;
use Exception;

class RegistrationNotFoundException extends Exception
{
    public function __construct(Cpf $cpf, int $code = 0, ?Exception $previous = null)
    {
        $message = "Registration number {$cpf} not found";
        parent::__construct($message, $code, $previous);
    }
}
