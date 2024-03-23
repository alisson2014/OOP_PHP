<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Pessoa\Cpf;

use IntegratedAirlines\Service\Model\Pessoa\ExceptionToString;

/**
 * class InvalidCpfException
 * @package IntegratedAirlines\Service\Model\Pessoa\Cpf
 */
final class InvalidCpfException extends \InvalidArgumentException
{
    use ExceptionToString;

    public function __construct(string $cpf)
    {
        parent::__construct("Erro, cpf: \"{$cpf}\" inválido!");   
    }
}
