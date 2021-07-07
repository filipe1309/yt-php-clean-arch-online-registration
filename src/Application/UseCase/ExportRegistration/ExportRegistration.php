<?php

namespace App\Application\UseCase\ExportRegistration;

use DateTime;
use App\Domain\ValueObject\Cpf;
use App\Domain\Repository\LoadRegistrationRepositoryInterface;

final class ExportRegistration
{
    public function __construct(
        private LoadRegistrationRepositoryInterface $repository
    ) {
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $cpf = new Cpf($input->getRegistrationNumber());
        $registration = $this->repository->loadByRegistrationNumber($cpf);
        return new OutputBoundary([
            'name' => $registration->getName(),
            'email' => (string) $registration->getEmail(),
            'birthDate' => $registration->getBirthDate()->format(DateTime::ATOM),
            'registrationNumber' => (string) $registration->getRegistrationNumber(),
            'registrationAt' => $registration->getRegistrationAt()->format(DateTime::ATOM),
        ]);
    }
}
