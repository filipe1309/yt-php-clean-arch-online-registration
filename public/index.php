<?php

use App\Domain\ValueObject\Cpf;
use App\Domain\ValueObject\Email;
use App\Domain\Entity\Registration;
use App\Application\UseCase\ExportRegistration\InputBoundary;
use App\Application\UseCase\ExportRegistration\ExportRegistration;

require_once '../vendor/autoload.php';

// Ep 2 - Domain Layer example

$registration =  new Registration();
$registration->setName('John')
    ->setBirthDate(new DateTimeImmutable('2010-01-02'))
    ->setEmail(new Email('john.doe@test.com'))
    ->setRegistrationAt(new DateTimeImmutable())
    ->setRegistrationNumber(new Cpf('370.100.370-00'));

echo '<pre>';
var_dump($registration);

// Ep 3 - Application Layer example

// $exportRegistrationUseCase = new ExportRegistration(MISS_IMPLMENTATION);
// $inputBoundary = new InputBoundary('370.100.370-00');
// $outputBoundary = $exportRegistrationUseCase->handle($inputBoundary);
