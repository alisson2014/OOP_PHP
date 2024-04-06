<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Cliente;

use IntegratedAirlines\Service\Model\Traits\ManageProperties;

final class Cidade
{
    use ManageProperties;

    public function __construct(
        private string $nome,
        public readonly string $estado
    ){
    }

    public function getNome(): string 
    {
        return $this->nome;
    }

    public function setNome(string $novoNome): void
    {
        $this->nome = $novoNome;
    }

    public function __toString(): string
    {
        return sprintf(
            "Cidade: %s\nEstado: %s\n",
            $this->nome, $this->estado
        );        
    }
}
