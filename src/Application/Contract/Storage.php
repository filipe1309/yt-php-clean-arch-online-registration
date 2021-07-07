<?php

declare(strict_types=1);

namespace App\Application\Contract;

interface Storage
{
    public function store(string $fileName, string $path, string $content): bool;
}
