<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Cliente;

use IntegratedAirlines\Service\Service\ViaCep;

final class Endereco
{
    public ?string $numero = null;

    public function __construct(
        public string $cep,
        public string $logradouro,
        public string $bairro,
        public string $localidade,
        public string $uf
    ) {
    }

    public function setNumero(?string $numero): void
    {
        $this->numero = $numero;        
    }

    public function setByCep(string $novoCep, ?string $numero = null): void
    {
        $endereco = ViaCep::get($novoCep, false);

        $this->cep = $endereco["cep"];
        $this->logradouro = $endereco["logradouro"];
        $this->bairro = $endereco["bairro"];
        $this->localidade = $endereco["localidade"];
        $this->uf = $endereco["uf"];
        $this->numero = $numero;
    }
}
