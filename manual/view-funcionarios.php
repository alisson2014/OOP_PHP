<?php 

declare(strict_types=1);

$funcionarios = require "funcionarios.php";

echo "---------------- Equipe do VOO XXX ----------------" . PHP_EOL;
foreach($funcionarios as $i => $funcionario) {
    $integrante = $i+1;

    echo PHP_EOL;
    echo "Integrante {$integrante}" . PHP_EOL;
    echo $funcionario . PHP_EOL;
}
echo "---------------- Equipe do VOO XXX ----------------" . PHP_EOL;