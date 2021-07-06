<?php

use App\Domain\Entity\Registration;
use App\Domain\ValueObject\Cpf;
use App\Domain\ValueObject\Email;

require_once '../vendor/autoload.php';

$registration =  new Registration;
$registration->setName('John')
    ->setBirthDate(new DateTimeImmutable('2010-01-02'))
    ->setEmail(new Email('john.doe@test.com'))
    ->setRegistrationAt(new DateTimeImmutable())
    ->setRegistrationNumber(new Cpf('370.100.370-00'));

echo '<pre>';
var_dump($registration);
