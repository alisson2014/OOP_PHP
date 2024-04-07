<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Passageiro;

final class Passagem 
{
    private readonly string $codigo;
    private static int $contador = 0;

    public function __construct(
        private float $valor,
        private readonly int $codigoVoo
    ){
        self::$contador++;
        $this->codigo = md5(self::$contador . $this->codigoVoo);
    }

    public function __destruct()
    {
        self::$contador--;
    }

    public static function getContador(): int
    {
        return self::$contador;        
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function getCodigoVoo(): int
    {
        return $this->codigoVoo;        
    }

    public function setValor(float $valor): void
    {
        $this->valor = $valor;
    }

    public function __toString(): string
    {
        return sprintf(
            "Codigo: %s\nValor: R$ %d\nCodigo voo: %d\n",
            $this->codigo, $this->valor, $this->codigoVoo
        );
    }
}
