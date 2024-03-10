<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Funcionario;

final class ComissarioVoo extends Funcionario
{
    protected function setCargo(): Cargo
    {
        return Cargo::COMISSARIO_VOO;
    }
}
