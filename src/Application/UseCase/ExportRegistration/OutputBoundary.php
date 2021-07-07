<?php

namespace App\Application\UseCase\ExportRegistration;

final class OutputBoundary
{
    private string $name;
    private string $email;
    private string $birthDate;
    private string $registrationNumber;
    private string $registrationAt;

    /**
     * @param array<string, string> $values
     */
    public function __construct(array $values)
    {
        $this->name = $values['name'] ?? '';
        $this->email = $values['email'] ?? '';
        $this->birthDate = $values['birthDate'] ?? '';
        $this->registrationNumber = $values['registrationNumber'] ?? '';
        $this->registrationAt = $values['registrationAt'] ?? '';
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    public function getRegistrationAt(): string
    {
        return $this->registrationAt;
    }
}
