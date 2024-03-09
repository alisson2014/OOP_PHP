<?php

declare(strict_types=1);

require_once("vendor/autoload.php");

use IntegratedAirlines\Service\Model\Funcionario\Comandante;
use IntegratedAirlines\Service\Model\Funcionario\Funcao;
use IntegratedAirlines\Service\Model\Usuario\{Cpf, Email, Usuario};

$piloto = new Comandante("João fernandes", "119.798.379-10");
$copiloto = Funcao::COPILOTO;

echo $piloto->getFuncao() . PHP_EOL;
echo $copiloto->value . PHP_EOL;



try {
    $cpf = new Cpf("420.068.690-27");
    $email = new Email("alissonteste@hotmail.com");
    $usuario = new Usuario("Alisson Vinicius", $email, $cpf);

    echo "--------------------------------" . PHP_EOL;
    echo "NOME: {$usuario->nome}" . PHP_EOL;
    echo "CPF: " . (string) $usuario->cpf . PHP_EOL;
    echo "EMAIL: " . (string) $usuario->email .PHP_EOL;
    echo "--------------------------------" . PHP_EOL;
} catch(\Exception $ex) {
    echo "Erro capturado: {$ex->getMessage()}" . PHP_EOL;
    echo "Traço: {$ex->getTraceAsString()}"  . PHP_EOL;
}