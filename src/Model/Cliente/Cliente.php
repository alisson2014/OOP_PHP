<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Cliente;

use IntegratedAirlines\Service\Model\Pessoa\Cpf\Cpf;
use IntegratedAirlines\Service\Model\Pessoa\Email\Email;
use IntegratedAirlines\Service\Model\Pessoa\Pessoa;

abstract class Cliente extends Pessoa
{
    protected Endereco $endereco;
    protected ?string $telefone = null;

    public function __construct(
        string $nome, 
        Cpf $cpf, 
        \DateTime $dataNascimento, 
        ?Email $email = null,
        Endereco $endereco,
        ?string $telefone = null
    ){
        parent::__construct($nome, $cpf, $dataNascimento, $email);

        $this->endereco = $endereco;
        $this->telefone = $telefone;
    }

    public function getEndereco(): Endereco
    {
        return $this->endereco;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function __toString(): string
    {
        $telefone = $this->getTelefone() ?? "Não cadastrado";
        
        return sprintf(
            parent::__toString() . "\nTelefone: %s\nEndereço: %s\n",
            $telefone, (string)$this->endereco
        );
    }
}
