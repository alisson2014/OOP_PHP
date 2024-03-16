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
        return  "Codigo: {$this->codigo}" . PHP_EOL .
                "Valor: R$ {$this->valor}" . PHP_EOL .
                "Codigo voo: {$this->codigoVoo}" . PHP_EOL;
    }
}
