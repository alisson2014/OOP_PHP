<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Funcionario;

final class Copiloto extends Funcionario
{
    protected function setCargo(): Cargo
    {
        return Cargo::COPILOTO;
    }
}
