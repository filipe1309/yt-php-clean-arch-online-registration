<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Application\UseCase\ExportRegistration\InputBoundary;
use App\Application\UseCase\ExportRegistration\ExportRegistration;

final class ExportRegistrationController
{
    public function __construct(
        private Request $request,
        private Response $response,
        private ExportRegistration $useCase
    ) {
    }

    public function handle(IPresentation $presentation): string|false
    {
        $inputBoundary = new InputBoundary('37010037000', 'xpto.pdf', __DIR__ . '/../../../../storage/registrations');

        $output = $this->useCase->handle($inputBoundary);

        return $presentation->output([
            'fullFileName' => $output->getFullFileName(),
        ]);
    }
}
