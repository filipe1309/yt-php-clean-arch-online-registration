<?php

namespace App\Domain\Repository;

use App\Domain\ValueObject\Cpf;
use App\Domain\Entity\Registration;

interface LoadRegistrationRepositoryInterface
{
    public function loadByRegistrationNumber(Cpf $registrationNumber): Registration;
}
