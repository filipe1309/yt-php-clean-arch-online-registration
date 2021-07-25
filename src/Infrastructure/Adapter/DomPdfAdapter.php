<?php

declare(strict_types=1);

namespace App\Infrastructure\Adapter;

use App\Domain\Entity\Registration;
use App\Application\Contract\ExportRegistrationPdfExporter;
use Dompdf\Dompdf;
use Dompdf\Options;
use Throwable;

final class DomPdfAdapter implements ExportRegistrationPdfExporter
{
    public function generate(Registration $registration): string
    {
        try {
            $options = new Options();
            $options->set('defaultFont', 'Arial');
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml("<p>Nome: {$registration->getName()}</p><p>CPF: {$registration->getRegistrationNumber()}</p>");
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();

            return $dompdf->output();
        } catch (Throwable $e) {
            return $e->getMessage();
        }
    }
}
