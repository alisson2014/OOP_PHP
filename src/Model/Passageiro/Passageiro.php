<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Passageiro;

use IntegratedAirlines\Service\Model\Cliente\{Cliente, Endereco};
use IntegratedAirlines\Service\Model\Pessoa\{Email, Cpf};

/**
 * class Passageiro
 * @package IntegratedAirlines\Service\Model\Passageiro
 * @property Bagagem $bagagem
 * @property Passagem $passagem
 */
final class Passageiro extends Cliente
{  
    public function __construct(
        string $nome, 
        Cpf $cpf, 
        \DateTime $dataNascimento,
        Endereco $endereco,
        private Bagagem $bagagem,
        private Passagem $passagem, 
        ?string $telefone = null,
        ?Email $email = null
    ) {
        parent::__construct($nome, $cpf, $dataNascimento, $email, $endereco, $telefone);
    }

    public function getPassagem(): Passagem
    {
        return $this->passagem;
    }

    public function __toString(): string
    {
        $telefone = $this->getTelefone() ?? "Não cadastrado";
        
        return "Nome: {$this->nome}" . PHP_EOL .
                "Cpf: {$this->getCpf()}" . PHP_EOL .
                "telefone: {$telefone}" . PHP_EOL .
                "Email: {$this->getEmail()}" . PHP_EOL .
                "Data nascimento: {$this->getDataNascimento()}" . PHP_EOL .
                "Idade: {$this->getIdade()}" . PHP_EOL . 
                $this->bagagem . $this->passagem . PHP_EOL;
    }
}
