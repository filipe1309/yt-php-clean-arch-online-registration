<?php

declare(strict_types=1);

namespace App\Infrastructure\Cli\Commands;

use App\Application\UseCase\ExportRegistration\ExportRegistration;
use App\Application\UseCase\ExportRegistration\InputBoundary;
use App\Infrastructure\Http\Controller\IPresentation;

final class ExportRegistrationCommand
{
    public function __construct(
        private ExportRegistration $useCase
    ) {
    }

    public function handle(IPresentation $presentation): string|false
    {
        $inputBoundary = new InputBoundary('37010037000', 'xpto-cli.pdf', __DIR__ . '/../../../../storage/registrations');

        $output = $this->useCase->handle($inputBoundary);

        return $presentation->output([
            'fullFileName' => $output->getFullFileName()
        ]);
    }
}
