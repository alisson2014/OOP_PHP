<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Passageiro;

use IntegratedAirlines\Service\Interface\ITripulante;
use IntegratedAirlines\Service\Model\Cliente\{Cliente, Endereco};
use IntegratedAirlines\Service\Model\Pessoa\Cpf\Cpf;
use IntegratedAirlines\Service\Model\Pessoa\Email\Email;
/**
 * class Passageiro
 * @package IntegratedAirlines\Service\Model\Passageiro
 * @property Bagagem $bagagem
 * @property Passagem $passagem
 */
final class Passageiro extends Cliente implements ITripulante
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
        return parent::__toString() . $this->bagagem . $this->passagem . PHP_EOL;
    }
}
