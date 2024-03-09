<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Funcionario;

enum Funcao: string
{
    case COMANDANTE = "Cuidar da condução da aeronave, manobras, supervisão do voo e prevenção de colisões.";
    case COPILOTO = "Auxiliar o comandante em comando durante a operação da aeronave.";
    case COMISSARIA_BORDO = "Cuidar das necessidades dos passageiros, fornecendo alimentos, bebidas e assistência.";

    final public function cargo(): string
    {
        return match($this) {
            Funcao::COMANDANTE => 'Comandante',
            Funcao::COPILOTO => 'Copiloto',
            Funcao::COMISSARIA_BORDO => 'Comissária de bordo'
        };
    }
}
