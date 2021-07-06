<?php

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

    /**
     * 
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): Registration
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @param Email $email
     */
    public function setEmail(Email $email): Registration
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return Cpf
     */
    public function getRegistrationNumber(): Cpf
    {
        return $this->registrationNumber;
    }

    /**
     * @param Cpf $registrationNumber
     */
    public function setRegistrationNumber(Cpf $registrationNumber): Registration
    {
        $this->registrationNumber = $registrationNumber;
        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getBirthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    /**
     * @param DateTimeInterface $birthDate
     */
    public function setBirthDate(DateTimeInterface $birthDate): Registration
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getRegistrationAt(): DateTimeInterface
    {
        return $this->registrationAt;
    }

    /**
     * @param DateTimeInterface $registrationAt
     */
    public function setRegistrationAt(DateTimeInterface $registrationAt): Registration
    {
        $this->registrationAt = $registrationAt;
        return $this;
    }
}
