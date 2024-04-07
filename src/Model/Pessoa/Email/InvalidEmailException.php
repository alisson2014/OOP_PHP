<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Pessoa\Email;

use IntegratedAirlines\Service\Model\Pessoa\ExceptionToString;

/**
 * class InvalidEmailException
 * @package IntegratedAirlines\Service\Model\Pessoa\Email
 */
final class InvalidEmailException extends \InvalidArgumentException
{
    use ExceptionToString;
    
    public function __construct(string $email)
    {
        parent::__construct("Erro, email: \"{$email}\" inválido!");   
    }
}
