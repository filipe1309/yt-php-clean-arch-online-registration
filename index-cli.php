<?php

declare(strict_types=1);

use App\Application\UseCase\ExportRegistration\ExportRegistration;
use App\Domain\Entity\Registration;
use App\Domain\ValueObject\Cpf;
use App\Domain\ValueObject\Email;
use App\Infrastructure\Adapter\DomPdfAdapter;
use App\Infrastructure\Adapter\LocalStorageAdapter;
use App\Infrastructure\Cli\Commands\ExportRegistrationCommand;
use App\Infrastructure\Presentation\ExportRegistrationPresenter;
use App\Infrastructure\Repository\MySQL\PdoRegistrationRepository;

require_once __DIR__ . '/vendor/autoload.php';

$configs = require __DIR__ . '/config/app.php';

// Entities

$registration =  new Registration();
$registration->setName('John')
    ->setBirthDate(new DateTimeImmutable('2010-01-02'))
    ->setEmail(new Email('john.doe@test.com'))
    ->setRegistrationAt(new DateTimeImmutable())
    ->setRegistrationNumber(new Cpf('370.100.370-00'));

$dsn = sprintf(
    'mysql:host=%s;port=%s;dbname=%s;charset=%s',
    $configs['db']['host'],
    $configs['db']['port'],
    $configs['db']['dbname'],
    $configs['db']['charset']
);

$pdo = new PDO($dsn, $configs['db']['username'], $configs['db']['password'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_PERSISTENT => true
]);

$loadRegistrationRepository = new PdoRegistrationRepository($pdo);
$pdfExporter = new DomPdfAdapter();
$storage = new LocalStorageAdapter();

// Use Cases
$exportRegistrationUseCase = new ExportRegistration($loadRegistrationRepository, $pdfExporter, $storage);

// Cli

$exportRegistrationCommand = new ExportRegistrationCommand($exportRegistrationUseCase);
$exportRegistrationPresenter = new ExportRegistrationPresenter();
echo $exportRegistrationCommand->handle($exportRegistrationPresenter);
