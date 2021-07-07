<?php

declare(strict_types=1);

namespace Tests;

use App\Domain\ValueObject\Cpf;
use DomainException;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function test_invalid_cpf_should_throw_exception(): void
    {
        $this->expectException(DomainException::class);
        new Cpf('123456789');
    }
}
