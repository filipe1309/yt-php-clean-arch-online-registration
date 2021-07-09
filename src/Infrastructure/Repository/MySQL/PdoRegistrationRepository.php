<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository\MySQL;

use PDO;
use App\Domain\ValueObject\Cpf;
use App\Domain\Entity\Registration;
use App\Domain\Exception\RegistrationNotFoundException;
use App\Domain\Repository\ILoadRegistrationRepository;
use App\Domain\ValueObject\Email;
use DateTimeImmutable;

final class PdoRegistrationRepository implements ILoadRegistrationRepository
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function loadByRegistrationNumber(Cpf $cpf): Registration
    {
        $stmt = $this->pdo->prepare('SELECT * FROM registration WHERE registration_number = :cpf');
        $stmt->execute([':cpf' => (string) $cpf]);
        $record = $stmt->fetch();

        if (!$record) {
            throw new RegistrationNotFoundException($cpf);
        }

        $registration =  new Registration();
        $registration->setName($record['name'])
            ->setBirthDate(new DateTimeImmutable($record['birth_date']))
            ->setEmail(new Email($record['email']))
            ->setRegistrationAt(new DateTimeImmutable($record['created_at']))
            ->setRegistrationNumber(new Cpf($record['registration_number']));

        return $registration;
    }
}
