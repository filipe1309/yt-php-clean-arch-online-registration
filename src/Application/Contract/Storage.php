<?php

namespace App\Application\Contract;

interface Storage
{
    public function store(string $fileName, string $path, string $content);
}
