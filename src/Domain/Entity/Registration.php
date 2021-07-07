<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\ValueObject\Cpf;
use App\Domain\ValueObject\Email;
use DateTimeInterface;

final class Registration
{
    private string $name;
    private Email $email;
    private Cpf $registrationNumber;
    private DateTimeInterface $birthDate;
    private DateTimeInterface $registrationAt;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Registration
    {
        $this->name = $name;
        return $this;
    }


    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail(Email $email): Registration
    {
        $this->email = $email;
        return $this;
    }

    public function getRegistrationNumber(): Cpf
    {
        return $this->registrationNumber;
    }

    public function setRegistrationNumber(Cpf $registrationNumber): Registration
    {
        $this->registrationNumber = $registrationNumber;
        return $this;
    }

    public function getBirthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(DateTimeInterface $birthDate): Registration
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    public function getRegistrationAt(): DateTimeInterface
    {
        return $this->registrationAt;
    }

    public function setRegistrationAt(DateTimeInterface $registrationAt): Registration
    {
        $this->registrationAt = $registrationAt;
        return $this;
    }
}
