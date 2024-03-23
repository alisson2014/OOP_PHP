<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Funcionario;

use IntegratedAirlines\Service\Interface\ITripulante;
use IntegratedAirlines\Service\Model\Pessoa\Cpf\Cpf;
use IntegratedAirlines\Service\Model\Pessoa\Email\Email;
use IntegratedAirlines\Service\Model\Pessoa\Pessoa;

/**
 * class Funcionario
 * @package IntegratedAirlines\Service\Model\Funcionario
 * @property Cargo $cargo
 * @method string getCargo()
 * @abstract Cargo setCargo()
 */
abstract class Funcionario extends Pessoa implements ITripulante
{
    protected Cargo $cargo;

    public function __construct(string $nome, Cpf $cpf, \DateTime $dataNascimento, ?Email $email = null) 
    {
        parent::__construct($nome, $cpf, $dataNascimento, $email);
        $this->cargo = $this->setCargo();
    }

    public function getCargo(bool $strict = false): string|Cargo
    {
        return $strict ? $this->cargo : $this->cargo->cargo();
    }

    abstract protected function setCargo(): Cargo;

    public function __toString(): string
    {
        return parent::__toString() . 
               "Cargo: {$this->getCargo()}" . PHP_EOL .
               "Função: {$this->cargo->value}" . PHP_EOL;
    }
}
