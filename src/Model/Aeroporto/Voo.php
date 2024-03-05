<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Aeroporto;

final class Voo
{
    private string $prefixo;
    private static int $contador = 0;
    private int $numero;

    public function __construct() {
        self::$contador++;
        $this->prefixo = 'IA';
        $this->numero = self::$contador;
    }

    public function __destruct() {
        self::$contador--;
    }

    public function getCodigoVoo(): string
    {
        return $this->prefixo . $this->numero;
    }

    public static function getTotalVoos(): int
    {
        return self::$contador;        
    }
}