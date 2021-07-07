<?php

namespace App\Application\UseCase\ExportRegistration;

final class OutputBoundary
{
    public function __construct(
        private string $fullFileName
    ) {
    }

    public function getFullFileName(): string
    {
        return $this->fullFileName;
    }
}
