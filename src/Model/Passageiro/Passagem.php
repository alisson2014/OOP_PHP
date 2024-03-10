<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Passageiro;

use IntegratedAirlines\Service\Model\Aeroporto\Voo;

final class Passagem 
{
    private readonly string $codigo;
    private static int $contador = 0;

    public function __construct(
        private float $valor,
        private Voo $voo,
        private Passageiro $passageiro

    ){
        self::$contador++;
        $this->codigo = md5(self::$contador . $this->voo->getCodigoVoo());
    }

    public function __destruct()
    {
        self::$contador--;
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function getPassageiro(): Passageiro
    {
        return $this->passageiro;
    }

    public function getVoo(): Voo
    {
        return $this->voo;        
    }

    public function setValor(float $valor): void
    {
        $this->valor = $valor;
    }

    public function setPassageiro(Passageiro $passageiro): void
    {
        $this->passageiro = $passageiro;        
    }

    public function setVoo(Voo $voo): void
    {
        $this->voo = $voo;
    }
}
