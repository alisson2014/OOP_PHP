<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Funcionario;

final class ComissarioVoo extends Funcionario
{
    public function __construct(string $nomeFuncionario, string $cpfFuncionario)
    {
        parent::__construct($nomeFuncionario, $cpfFuncionario);
    }

    protected function setCargo(): Cargo
    {
        return Cargo::COMISSARIO_VOO;
    }
}
