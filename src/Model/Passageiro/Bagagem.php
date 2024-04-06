<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Passageiro;

final class Bagagem
{
    private static int $contagem = 0;
    public readonly int $codigo;
    public readonly float $peso;

    public function __construct(float $peso)
    {  
        self::$contagem++;
        $this->codigo = self::$contagem;
        $this->peso = round($peso, 2);
    }

    public function __destruct()
    {
        self::$contagem--;
    }

    public function __toString(): string
    {
        return sprintf(
            "CODIGO BAGAGEM: %d\nPESO BAGAGEM: %d kg\n",
            $this->codigo, $this->peso
        );
    }

    public static function getContagem(): int
    {
        return self::$contagem;        
    }
}
