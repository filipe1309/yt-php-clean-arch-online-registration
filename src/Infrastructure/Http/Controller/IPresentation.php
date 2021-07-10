<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller;

interface IPresentation
{
    public function output(array $data): string;
}
