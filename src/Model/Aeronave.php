<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model;

class Aeronave extends Model
{
    public const STATUS_INATIVO = "INATIVO";
    public const STATUS_MANUTENCAO = "MANUTENÇÃO";
    public const STATUS_LIVRE = "LIVRE";
    public const TODOS_STATUS = [self::STATUS_INATIVO, self::STATUS_LIVRE, self::STATUS_MANUTENCAO];

    private string $status = self::STATUS_LIVRE;

    public function __construct(
        public readonly string $modelo,
        public int $capacidade
    ){
    }

    public function getModelo(): string
    {
        return $this->modelo;        
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setCapacidade(int $novaCapacidade): void
    {
        $this->capacidade = $novaCapacidade;
    }

    public function setStatus(string $status): void
    {
        if(!in_array($status, self::TODOS_STATUS)) {
            throw new \InvalidArgumentException("Tipo do status inválido");
        }

        $this->status = $status;
    }
}
