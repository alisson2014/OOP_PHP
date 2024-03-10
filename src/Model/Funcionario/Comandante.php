<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Funcionario;

final class Comandante extends Funcionario
{
    protected function setCargo(): Cargo
    {
        return Cargo::COMANDANTE;
    }
}
