<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Passageiro;

use IntegratedAirlines\Service\Model\Pessoa\{Email, Cpf, Pessoa};

final class Passageiro extends Pessoa
{  
    public Bagagem $bagagem;

    public function __construct(
        string $nome, 
        Cpf $cpf, 
        Email $email, 
        Bagagem $bagagem
    ) {
        parent::__construct($nome, $cpf, $email);
        
        $this->bagagem = $bagagem;
    }
}
