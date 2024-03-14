<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Passageiro;

use IntegratedAirlines\Service\Model\Aeroporto\Voo;

final class Checkin
{
    public static function validar(Passageiro $passageiro, Voo $voo): bool
    {
        return $passageiro->getPassagem()->getCodigoVoo() === $voo->getCodigoVoo();
    }
}
