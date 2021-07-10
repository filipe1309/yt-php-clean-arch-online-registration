<?php

declare(strict_types=1);

namespace App\Infrastructure\Presentation;

use App\Infrastructure\Http\Controller\IPresentation;

final class ExportRegistrationPresenter implements IPresentation
{
    public function output(array $data): string|false
    {
        return json_encode($data);
    }
}
