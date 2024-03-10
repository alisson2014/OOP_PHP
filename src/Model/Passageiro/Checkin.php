<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Passageiro;

final class Checkin
{
    public static function validar(Passageiro $passageiro, Passagem $passagem)
    {
        if($passagem->getPassageiro() !== $passageiro) {
            throw new \LogicException("Passageiro não é o mesmo da passagem.");
        }

        return true;
    }
}
