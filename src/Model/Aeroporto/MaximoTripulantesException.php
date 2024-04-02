<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Aeroporto;

use IntegratedAirlines\Service\Interface\ITripulante;
use IntegratedAirlines\Service\Model\Passageiro\Passageiro;

final class MaximoTripulantesException extends \DomainException
{
    public function __construct(ITripulante $tripulante)
    {
        $tipoTripulante = is_a($tripulante, Passageiro::class) ? "passageiros" : "tripulantes";

        parent::__construct("O voo atingiu o número máximo de {$tipoTripulante}");   
    }
}
