<?php

namespace App\Application\Contract;

use App\Domain\Entity\Registration;

interface ExportRegistrationPdfExporter
{
    public function generate(Registration $registration): string;
}
