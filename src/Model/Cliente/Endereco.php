<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Cliente;

use IntegratedAirlines\Service\Model\Traits\ManageProperties;
use IntegratedAirlines\Service\Service\ViaCep;

/**
 * class Endereco
 * @package IntegratedAirlines\Service\Model\Cliente
 */
final class Endereco
{
    use ManageProperties;

    private ?string $numero = null;

    public function __construct(
        private string $cep,
        private string $logradouro,
        private string $bairro,
        private Cidade $cidade
    ) {
    }

    public function getNumero(): ?string
    {
        return $this->numero;        
    }

    public function getCep(): string
    {
        return $this->cep;        
    }

    public function getLogradouro(): string
    {
        return $this->logradouro;        
    }

    public function getBairro(): string
    {
        return $this->bairro;        
    }

    public function getCidade(bool $toString = false): Cidade
    {
        return $toString ? (string) $this->cidade : $this->cidade;
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
        $this->cidade = new Cidade($endereco["localidade"], $endereco["uf"]);
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

    public function setCidade(Cidade $cidade): void
    {
        $this->cidade = $cidade;
    }

    public function __toString(): string
    {
        return "{$this->logradouro}, {$this->numero} - {$this->cep}";   
    }
}
