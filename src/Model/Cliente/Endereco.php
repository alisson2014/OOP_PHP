<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Cliente;

use IntegratedAirlines\Service\Service\ViaCep;

/**
 * class Endereco
 * @package IntegratedAirlines\Service\Model\Cliente
 */
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

    public function setCep(string $cep): void
    {
        $this->cep = $cep;        
    }

    public function setLogradouro(string $logradouro): void
    {
        $this->logradouro = $logradouro;
    }

    public function setBairro(string $bairro): void
    {
        $this->bairro = $bairro;        
    }

    public function setLocalidade(string $localidade): void   
    {
        $this->localidade = $localidade;    
    }

    public function setUf(string $uf): void
    {
        $this->uf = $uf;        
    }

    public function __toString(): string
    {
        return "{$this->logradouro}, {$this->numero} - {$this->cep}";   
    }
}
