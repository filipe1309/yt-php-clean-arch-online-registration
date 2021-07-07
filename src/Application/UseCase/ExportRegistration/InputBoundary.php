<?php

namespace App\Application\UseCase\ExportRegistration;

final class InputBoundary
{
    public function __construct(
        private string $registrationNumber,
        private string $pdfFileName,
        private string $path,
    ) {
    }

    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    public function getPdfFileName(): string
    {
        return $this->pdfFileName;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
