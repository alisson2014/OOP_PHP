<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Aeronave;

final class Aeronave
{
    public function __construct(
        public readonly string $modelo,
        private Capacidade $capacidade,
        private Status $status = Status::LIVRE
    ){
    }

    public function getModelo(): string
    {
        return $this->modelo;        
    }

    public function getStatus($strict = false): string
    {
        return $strict ? $this->status : $this->status->value;
    }

    public function getCapacidade($toInt = true): int|Capacidade
    {
        return $toInt ? $this->capacidade->value : $this->capacidade;        
    }

    public function setCapacidade(Capacidade $novaCapacidade): void
    {
        $this->capacidade = $novaCapacidade;
    }

    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    public function __toString(): string
    {
        return "Modelo: {$this->modelo}" . PHP_EOL .
                "Capacidade: {$this->capacidade->value}" . PHP_EOL . 
                "Status: {$this->status->value}" . PHP_EOL;
    }
}
