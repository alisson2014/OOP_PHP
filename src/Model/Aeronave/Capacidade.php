<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Aeronave;

enum Capacidade: int
{
    const PASSAGEIROS = "passageiros";
    const FUNCIONARIOS = "funcionarios";
    case PEQUENO = 50;
    case MEDIA = 140;
    case GRANDE = 230;

    public function capacidade(): array
    {
        return match($this) {
            self::PEQUENO => [
                self::PASSAGEIROS => 46,
                self::FUNCIONARIOS => 4
            ],
            self::MEDIA => [
                self::PASSAGEIROS => 132,
                self::FUNCIONARIOS => 8
            ],
            self::GRANDE => [
                self::PASSAGEIROS => 210,
                self::FUNCIONARIOS => 20
            ]
        };
    }
}
