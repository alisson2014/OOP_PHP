<?php

declare(strict_types=1);

require_once("vendor/autoload.php");

use IntegratedAirlines\Service\Model\Aeroporto\{Voo, Aeroporto, Porte};
use IntegratedAirlines\Service\Model\Aeronave\{Aeronave, Capacidade};
use IntegratedAirlines\Service\Model\Cliente\Cidade;

$passageiros = require "passageiros.php";
$funcionarios = require "funcionarios.php";

$tripulantes = [...$passageiros, ...$funcionarios];

$voo1 = new Voo(
    new Aeronave("Teste 1", Capacidade::PEQUENO),
    new Cidade("São Paulo", "SP")    
);

$voo1->addAll($tripulantes);

$aeroporto = new Aeroporto("Aeroporto de guarulhos", new Cidade("São paulo", "SP"), Porte::GRANDE);
$aeroporto->addVoo($voo1);

var_dump($aeroporto);