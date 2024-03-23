<?php

declare(strict_types=1);

require_once("vendor/autoload.php");
require_once("funcionarios.php");
require_once("passageiros.php");

use IntegratedAirlines\Service\Model\Aeroporto\Voo;
use IntegratedAirlines\Service\Model\Aeronave\{Aeronave, Capacidade};
use IntegratedAirlines\Service\Model\Aeroporto\Aeroporto;
use IntegratedAirlines\Service\Model\Aeroporto\Porte;
use IntegratedAirlines\Service\Model\Cliente\Cidade;

$tripulantes = [...$passageiros, ...$funcionarios];

$voo1 = new Voo(
    new Aeronave("Teste 1", Capacidade::PEQUENO),
    new Cidade("São Paulo", "SP")    
);

foreach($tripulantes as $tripulante) {
    $voo1->add($tripulante);
}

$aeroporto = new Aeroporto("Aeroporto de guarulhos", new Cidade("São paulo", "SP"), Porte::GRANDE, [$voo1]);

var_dump($aeroporto);