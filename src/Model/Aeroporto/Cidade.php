<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Aeroporto;

final class Cidade
{
    public function __construct(
        private string $nome,
        public readonly string $estado
    ){
    }

    public function getNome(): string 
    {
        return $this->nome;
    }
}
