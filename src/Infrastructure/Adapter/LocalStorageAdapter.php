<?php

declare(strict_types=1);

namespace App\Infrastructure\Adapter;

use App\Application\Contract\Storage;

final class LocalStorageAdapter implements Storage
{
    public function store(string $fileName, string $path, string $content): bool
    {
        return (bool) file_put_contents($path . DIRECTORY_SEPARATOR . $fileName, $content);
    }
}
