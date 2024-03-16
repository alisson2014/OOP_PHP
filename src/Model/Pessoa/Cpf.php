<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Pessoa;

/**
 * class Cpf
 * @package IntegratedAirlines\Service\Model\Pessoa
 * @property string $cpf
 * @method bool valida(string $cpf)
 */
final readonly class Cpf
{
    private string $cpf;

    public function __construct(string $cpf)
    {
        if(!$this->valida($cpf)) {
            throw new \InvalidArgumentException("Erro, cpf inválido!");
        }

        $this->cpf = $cpf;
    }

    public function __toString(): string
    {
        return $this->cpf;
    }

    private function valida(string $cpf): bool
    {
        $cpf = filter_var($cpf, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);

        return $cpf !== false;
    }
}