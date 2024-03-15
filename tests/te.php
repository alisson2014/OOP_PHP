<?php

declare(strict_types=1);

require_once("vendor/autoload.php");

use IntegratedAirlines\Service\Service\ViaCep;

$meuEndereco = ViaCep::get("87309102");
var_dump($meuEndereco);