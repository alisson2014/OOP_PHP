<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Pessoa\Cpf;

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
            throw new InvalidCpfException($cpf);
        }

        $this->cpf = $cpf;
    }

    public function __toString(): string
    {
        return $this->cpf;
    }

    private function valida(string $cpf): bool
    {
        $filteredCpf = filter_var($cpf, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);

        return $filteredCpf !== false;
    }
}