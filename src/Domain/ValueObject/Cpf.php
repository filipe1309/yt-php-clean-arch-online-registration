<?php

namespace App\Domain\ValueObject;

use DomainException;

final class Cpf
{
    private string $cpf;

    public function __construct(string $cpf)
    {
        if (!$this->validate($cpf)) {
            throw new DomainException('Invalid cpf');
        }

        $this->cpf = $cpf;
    }

    private function validate($cpf)
    {

        // Extract only numbers
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Not 11 digits or all repeated. Ex: 111.111.111-11
        if ((strlen($cpf) !== 11) || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Module 11 to validate CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] !== $d) {
                return false;
            }
        }
        return true;
    }

    public function __toString(): string
    {
        return $this->cpf;
    }
}
