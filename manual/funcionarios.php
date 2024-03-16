<?php

declare(strict_types=1);

require_once("vendor/autoload.php");

use IntegratedAirlines\Service\Model\Funcionario\{Copiloto, Comandante, ComissarioVoo};
use IntegratedAirlines\Service\Model\Pessoa\{Email, Cpf};

$piloto = new Comandante("João gustavo", new Cpf("952.034.840-90"), new \DateTime("2001-09-21"), new Email("joaogusta200@gmail.com"));
$copiloto = new Copiloto("Anderson Fernandes", new Cpf("302.352.260-09"), new \DateTime("2002-10-31"), new Email("burnes2001@hotmail.com"));
$comissariaBordo1 = new ComissarioVoo("Aline franco", new Cpf("328.386.170-60"), new \DateTime("1999-04-01"), new Email("alinefr33d@hotmail.com"));
$comissariaBordo2 = new ComissarioVoo("Ana júlia", new Cpf("088.241.290-64"), new \DateTime("2003-12-09"), new Email("anajujuba80d@outlook.com.br"));

$funcionarios = [$piloto, $copiloto, $comissariaBordo1, $comissariaBordo2];

echo "---------------- Equipe do VOO XXX ----------------" . PHP_EOL;
foreach($funcionarios as $i => $funcionario) {
    $integrante = $i+1;

    echo PHP_EOL;
    echo "Integrante {$integrante}" . PHP_EOL;
    echo $funcionario . PHP_EOL;
}
echo "---------------- Equipe do VOO XXX ----------------" . PHP_EOL;