<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Funcionario;

use IntegratedAirlines\Service\Model\Pessoa;

abstract class Funcionario extends Pessoa
{
    protected Funcao $funcao;

    public function __construct(
        string $nomeFuncionario,
        string $cpfFuncionario
    ) {
        parent::__construct($nomeFuncionario, $cpfFuncionario);
        $this->funcao = $this->setFuncao();
    }

    public function getFuncao(): string
    {
        return $this->funcao->cargo();
    }

    abstract protected function setFuncao(): Funcao;

    public function __toString(): string
    {
        return "Nome: {$this->nome}" . PHP_EOL .
                "Função: {$this->getFuncao()}" . PHP_EOL;
    }
}
