<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Funcionario;

use IntegratedAirlines\Service\Model\Pessoa\{Cpf, Email, Pessoa};
use IntegratedAirlines\Service\Model\Tripulante;

/**
 * class Funcionario
 * @package IntegratedAirlines\Service\Model\Funcionario
 * @property Cargo $cargo
 * @method string getCargo()
 * @abstract Cargo setCargo()
 */
abstract class Funcionario extends Pessoa implements Tripulante
{
    protected Cargo $cargo;

    public function __construct(string $nome, Cpf $cpf, \DateTime $dataNascimento, ?Email $email = null) 
    {
        parent::__construct($nome, $cpf, $dataNascimento, $email);
        $this->cargo = $this->setCargo();
    }

    public function getCargo(): string
    {
        return $this->cargo->cargo();
    }

    abstract protected function setCargo(): Cargo;

    public function __toString(): string
    {
        return parent::__toString() . 
               "Cargo: {$this->getCargo()}" . PHP_EOL .
               "Função: {$this->cargo->value}" . PHP_EOL;
    }
}
