<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\ValueObject\Cpf;
use App\Domain\Entity\Registration;

interface ILoadRegistrationRepository
{
    public function loadByRegistrationNumber(Cpf $registrationNumber): Registration;
}
