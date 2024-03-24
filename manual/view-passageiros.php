<?php

declare(strict_types=1);

$passageiros = require "passageiros.php";

echo "---------------- Passageiros ----------------" . PHP_EOL;
foreach($passageiros as $i => $passageiro) {
    $contagem = $i+1;

    echo PHP_EOL;
    echo "Passageiro: {$contagem}" . PHP_EOL;
    echo $passageiro . PHP_EOL;
}
echo "---------------- Passageiros ----------------" . PHP_EOL;