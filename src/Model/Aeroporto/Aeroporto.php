<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Aeroporto;

use IntegratedAirlines\Service\Model\Cliente\Cidade;
use SplObjectStorage;

class Aeroporto
{   
    private ?SplObjectStorage $voos = null;

    public function __construct(
        private string $nome,
        private Cidade $cidade,
        private Porte $porte
    ){
        $this->voos = new SplObjectStorage();
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCidade(): Cidade
    {
        return $this->cidade;
    }

    public function getPorte(): Porte
    {
        return $this->porte;
    }

    public function getVoos(): SplObjectStorage
    {
        return clone $this->voos;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setCidade(Cidade $cidade): void
    {
        $this->cidade = $cidade;
    }

    public function setPorte(Porte $porte): void
    {
        $this->porte = $porte;
    }

    public function addVoo(Voo $voo): void
    {
        $this->voos->attach($voo);
    }
}
