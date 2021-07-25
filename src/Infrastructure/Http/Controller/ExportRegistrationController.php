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

    public function handle(IPresentation $presentation): Response
    {
        $inputBoundary = new InputBoundary('37010037000', 'xpto-ctrl.pdf', __DIR__ . '/../../../../storage/registrations');

        $output = $this->useCase->handle($inputBoundary);

        $this->response->getBody()->write($presentation->output([
            'fullFileName' => $output->getFullFileName(),
        ]));

        return $this->response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
