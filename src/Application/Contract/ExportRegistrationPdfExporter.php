<?php

declare(strict_types=1);

namespace App\Application\Contract;

use App\Domain\Entity\Registration;

interface ExportRegistrationPdfExporter
{
    public function generate(Registration $registration): string;
}
