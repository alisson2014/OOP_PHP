<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Aeronave;

class Aeronave
{
    private Status $status = Status::LIVRE;

    public function __construct(
        public readonly string $modelo,
        private Capacidade $capacidade
    ){
    }

    public function getModelo(): string
    {
        return $this->modelo;        
    }

    public function getStatus(): string
    {
        return $this->status->value;
    }

    public function getCapacidade(): Capacidade
    {
        return $this->capacidade;        
    }

    public function setCapacidade(Capacidade $novaCapacidade): void
    {
        $this->capacidade = $novaCapacidade;
    }

    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }
}
