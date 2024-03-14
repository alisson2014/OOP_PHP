<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Passageiro;

final class Bagagem
{
    private static int $contagem = 0;
    public readonly int $codigo;

    public function __construct(
        public readonly float $peso,
        private Passageiro $passageiro
    ){  
        self::$contagem++;
        $this->codigo = self::$contagem;
    }
}
