<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Funcionario;

use IntegratedAirlines\Service\Model\Pessoa;

abstract class Funcionario extends Pessoa
{
    protected Cargo $cargo;

    public function __construct(
        string $nomeFuncionario,
        string $cpfFuncionario
    ) {
        parent::__construct($nomeFuncionario, $cpfFuncionario);
        $this->cargo = $this->setCargo();
    }

    public function getCargo(): string
    {
        return $this->cargo->cargo();
    }

    abstract protected function setCargo(): Cargo;

    public function __toString(): string
    {
        return "Nome: {$this->nome}" . PHP_EOL .
                "Cpf: {$this->cpf}" . PHP_EOL .
                "Cargo: {$this->getCargo()}" . PHP_EOL .
                "Função: {$this->cargo->value}" . PHP_EOL;
    }
}
