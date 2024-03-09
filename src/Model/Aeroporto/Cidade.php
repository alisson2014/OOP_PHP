<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Aeroporto;

use IntegratedAirlines\Service\Model\Model;

final class Cidade extends Model
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
