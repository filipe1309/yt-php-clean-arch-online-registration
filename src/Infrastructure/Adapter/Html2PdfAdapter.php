<?php

declare(strict_types=1);

namespace App\Infrastructure\Adapter;

use HTML2PDF;
use App\Domain\Entity\Registration;
use App\Application\Contract\ExportRegistrationPdfExporter;
use HTML2PDF_exception;

final class Html2PdfAdapter implements ExportRegistrationPdfExporter
{
    public function generate(Registration $registration): string
    {
        $html2pdf = new HTML2PDF('P', 'A4');

        try {
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML(
                "<p>Nome: {$registration->getName()}</p><p>CPF: {$registration->getRegistrationNumber()}</p>"
            );

            return $html2pdf->output('', 'S');
        } catch (HTML2PDF_exception $e) {
            echo $e->getMessage();
        }
    }
}
