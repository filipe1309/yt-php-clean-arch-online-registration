<?php

namespace App\Application\UseCase\ExportRegistration;

final class InputBoundary
{
    public function __construct(
        private string $registrationNumber
    ) {
    }

    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }
}
