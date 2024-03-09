<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Funcionario;

final class Copiloto extends Funcionario
{
    public function __construct(string $nomeFuncionario, string $cpfFuncionario)
    {
        parent::__construct($nomeFuncionario, $cpfFuncionario);
    }

    protected function setFuncao(): Funcao
    {
        return Funcao::COPILOTO;
    }
}
