<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Passageiro;

final class Checkin
{
    public static function validar(Passageiro $passageiro, Passagem $passagem)
    {
        return $passagem->getPassageiro() !== $passageiro;
    }
}
