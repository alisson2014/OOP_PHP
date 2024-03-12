<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Aeronave;

enum Capacidade: int
{
    case PEQUENO = 50;
    case MEDIA = 140;
    case GRANDE = 230;

    public function capacidade(): array
    {
        return match($this) {
            self::PEQUENO => [
                "passageiros" => 46,
                "funcionarios" => 4
            ],
            self::MEDIA => [
                "passageiros" => 132,
                "funcionarios" => 8
            ],
            self::GRANDE => [
                "passageiros" => 210,
                "funcionarios" => 20
            ]
        };
    }
}
