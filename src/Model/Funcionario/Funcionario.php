<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Funcionario;

use IntegratedAirlines\Service\Model\Pessoa\{Cpf, Email, Pessoa};

abstract class Funcionario extends Pessoa
{
    protected Cargo $cargo;

    public function __construct(
        string $nomeFuncionario,
        Cpf $cpfFuncionario,
        Email $email
    ) {
        parent::__construct($nomeFuncionario, $cpfFuncionario, $email);
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
                "Cpf: {$this->getCpf()}" . PHP_EOL .
                "Email: {$this->getEmail()}" . PHP_EOL .
                "Cargo: {$this->getCargo()}" . PHP_EOL .
                "Função: {$this->cargo->value}" . PHP_EOL;
    }
}
