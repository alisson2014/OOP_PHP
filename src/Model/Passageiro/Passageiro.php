<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Passageiro;

use DateTime;
use IntegratedAirlines\Service\Model\Cliente\Cliente;
use IntegratedAirlines\Service\Model\Cliente\Endereco;
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
        Email $email, 
        DateTime $dataNascimento,
        Endereco $endereco,
        string $telefone,
        private Bagagem $bagagem,
        private Passagem $passagem 
    ) {
        parent::__construct($nome, $cpf, $dataNascimento, $email, $endereco, $telefone);
    }

    public function getPassagem(): Passagem
    {
        return $this->passagem;
    }
}
