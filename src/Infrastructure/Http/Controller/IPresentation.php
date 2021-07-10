<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller;

interface IPresentation
{
    /**
     * @param array<string, string> $data
     */
    public function output(array $data): string|false;
}
