<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Usuario;

use IntegratedAirlines\Service\Model\Model;
use IntegratedAirlines\Service\Service\Validador;

final class Cpf extends Model
{
    private string $cpf;

    public function __construct(string $cpf)
    {
        if(!Validador::validaCpf($cpf)) {
            throw new \InvalidArgumentException("Erro, cpf inválido!");
        }

        $this->cpf = $cpf;
    }

    public function __toString(): string
    {
        return $this->cpf;
    }
}