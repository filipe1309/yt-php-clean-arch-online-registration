<?php

declare(strict_types=1);

namespace App\Application\UseCase\ExportRegistration;

use App\Domain\ValueObject\Cpf;
use App\Application\Contract\Storage;
use App\Application\Contract\ExportRegistrationPdfExporter;
use App\Domain\Repository\ILoadRegistrationRepository;

final class ExportRegistration
{
    public function __construct(
        private ILoadRegistrationRepository $repository,
        private ExportRegistrationPdfExporter $pdfExporter,
        private Storage $storage,
    ) {
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $cpf = new Cpf($input->getRegistrationNumber());
        $registration = $this->repository->loadByRegistrationNumber($cpf);

        $fileContent = $this->pdfExporter->generate($registration);

        $this->storage->store($input->getPdfFileName(), $input->getPath(), $fileContent);

        return new OutputBoundary($input->getPath() . DIRECTORY_SEPARATOR . $input->getPdfFileName());
    }
}
