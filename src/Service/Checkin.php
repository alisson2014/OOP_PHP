<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Service;

use IntegratedAirlines\Service\Model\Passageiro\Passageiro;

final class Checkin
{
    public static function validar(Passageiro $passageiro, string $codigoVoo): true
    {
        if(is_null($passageiro->getTelefone()) || is_null($passageiro->getEmail())) {
            throw new \DomainException(
                "Passageiro com cadastro imcompleto." . PHP_EOL . 
                "Complete-o para continuar o checkin."
            );
        }

        if($passageiro->getPassagem()->getCodigoVoo() !== $codigoVoo) {
            throw new \LogicException("Passagem para o voo errado.");
        }

        return true;
    }
}
