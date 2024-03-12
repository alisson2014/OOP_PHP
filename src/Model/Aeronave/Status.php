<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Aeronave;

enum Status: string
{
    case INATIVO = "INATIVO";
    case MANUTENCAO = "MANUTENÇÃO";
    case LIVRE = "LIVRE";
}
