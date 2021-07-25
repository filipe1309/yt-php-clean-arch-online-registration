<?php

declare(strict_types=1);

use App\Application\UseCase\ExportRegistration\ExportRegistration;
use App\Application\UseCase\ExportRegistration\InputBoundary;
use App\Domain\Entity\Registration;
use App\Domain\ValueObject\Cpf;
use App\Domain\ValueObject\Email;
use App\Infrastructure\Adapter\DomPdfAdapter;
use App\Infrastructure\Adapter\LocalStorageAdapter;
use App\Infrastructure\Http\Controller\ExportRegistrationController;
use App\Infrastructure\Presentation\ExportRegistrationPresenter;
use App\Infrastructure\Repository\MySQL\PdoRegistrationRepository;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

require_once '../vendor/autoload.php';

$configs = require __DIR__ . '/../config/app.php';

// Ep 2 - Domain Layer example

$registration =  new Registration();
$registration->setName('John')
    ->setBirthDate(new DateTimeImmutable('2010-01-02'))
    ->setEmail(new Email('john.doe@test.com'))
    ->setRegistrationAt(new DateTimeImmutable())
    ->setRegistrationNumber(new Cpf('370.100.370-00'));

// echo '<pre>';
// var_dump($registration);

// Ep 3 - Application Layer example

// $exportRegistrationUseCase = new ExportRegistration(MISS_IMPLMENTATION);
// $inputBoundary = new InputBoundary('370.100.370-00');
// $outputBoundary = $exportRegistrationUseCase->handle($inputBoundary);


// Ep 4 - Application PDF Tool & Storage 

// $exportRegistrationUseCase = new ExportRegistration(MISS_IMPLMENTATION);
// $inputBoundary = new InputBoundary('370.100.370-00', 'xpto', '/../storage');
// $outputBoundary = $exportRegistrationUseCase->handle($inputBoundary);

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

// Storage example
// $entity = $loadRegistrationRepository->loadByRegistrationNumber(new Cpf('37010037000'));
// echo '<pre>';
// var_dump($entity);

// Export example
// $content = $pdfExporter->generate($registration);
// $storage->store('test.pdf', '../storage/registrations', $content);
$exportRegistrationUseCase = new ExportRegistration($loadRegistrationRepository, $pdfExporter, $storage);

// Controllers

$request =  new Request('GET', 'http://localhost');
$response = new Response();
$exportRegistrationController = new ExportRegistrationController($request, $response, $exportRegistrationUseCase);
$exportRegistrationPresenter = new ExportRegistrationPresenter();

echo $exportRegistrationController->handle($exportRegistrationPresenter)->getBody();
