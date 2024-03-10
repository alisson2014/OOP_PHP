<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Funcionario;

enum Cargo: string
{
    case COMANDANTE = "Cuidar da condução da aeronave, manobras, supervisão do voo e prevenção de colisões.";
    case COPILOTO = "Auxiliar o comandante em comando durante a operação da aeronave.";
    case COMISSARIO_VOO = "Cuidar das necessidades dos passageiros, fornecendo alimentos, bebidas e assistência.";

    final public function cargo(): string
    {
        return match($this) {
            Cargo::COMANDANTE => 'Comandante',
            Cargo::COPILOTO => 'Copiloto',
            Cargo::COMISSARIO_VOO => 'Comissário de voo/bordo'
        };
    }
}
