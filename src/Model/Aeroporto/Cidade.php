<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Aeroporto;

use IntegratedAirlines\Service\Model\Model;

final class Cidade extends Model
{
    public function __construct(
        private string $nome,
        private string $estado
    ){
    }

    public function getNome(): string 
    {
        return $this->nome;
    }

    public function getEstado(): string
    {
        return $this->estado;        
    }
}
