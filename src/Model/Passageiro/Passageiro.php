<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Passageiro;

use IntegratedAirlines\Service\Model\Pessoa\{Email, Cpf, Pessoa};

/**
 * class Passageiro
 * @package IntegratedAirlines\Service\Model\Passageiro
 * @property Bagagem $bagagem
 * @property Passagem $passagem
 */
final class Passageiro extends Pessoa
{  
    public function __construct(
        string $nome, 
        Cpf $cpf, 
        Email $email, 
        private Bagagem $bagagem,
        private Passagem $passagem 
    ) {
        parent::__construct($nome, $cpf, $email);
    }

    public function getPassagem(): Passagem
    {
        return $this->passagem;
    }
}
