<?php

declare(strict_types=1);

require_once("vendor/autoload.php");

use IntegratedAirlines\Service\Model\Passageiro\{Bagagem, Passageiro, Passagem};
use IntegratedAirlines\Service\Model\Pessoa\{Cpf, Email};
use IntegratedAirlines\Service\Service\ViaCep;

$joaoEndereco = ViaCep::get("89070650");
$joaoEndereco->setNumero("12");

$joao = new Passageiro(
    "João gustavo",
    new Cpf("457.808.400-08"),
    new \DateTime("2000-01-21"),
    $joaoEndereco,
    new Bagagem(39.238),
    new Passagem(10, 1),
    email: new Email("joaogus@gmail.com")
);

$ana = new Passageiro(
    "Ana portez",
    new Cpf("464.443.170-29"),
    new \DateTime("2003-09-31"),
    ViaCep::get("78080405"),
    new Bagagem(51.787),
    new Passagem(10, 1),
    telefone: "44991234567"
);

$bagagem = new Bagagem(47.6);

$jonas = new Passageiro(
    "Jonas alberto",
    new Cpf("602.795.060-90"),
    new \DateTime("1999-01-10"),
    ViaCep::get("76961642"),
    $bagagem,
    new Passagem(125, 2),
    "11991236789",
    new Email("jonasal@outlook.com.br")
);

$alissonEndereco = ViaCep::get("59123-221");
$alissonEndereco->setNumero("11a");

$alisson = new Passageiro(
    "Alisson Vinicius",
    new Cpf("286.616.120-39"),
    new \DateTime("2004-06-15"),
    $alissonEndereco,
    $bagagem,
    new Passagem(125, 2)    
);

$passageiros = [$alisson, $jonas, $ana, $joao];

echo "---------------- Passageiros ----------------" . PHP_EOL;
foreach($passageiros as $i => $passageiro) {
    $contagem = $i+1;

    echo PHP_EOL;
    echo "Passageiro: {$contagem}" . PHP_EOL;
    echo $passageiro . PHP_EOL;
}
echo "---------------- Passageiros ----------------" . PHP_EOL;