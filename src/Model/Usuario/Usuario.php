<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Usuario;
use IntegratedAirlines\Service\Model\Model;

class Usuario extends Model {

    public function __construct(
        private string $nome,
        private Email $email,
        private Cpf $cpf 
    ) {
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function getEmail(): Email {
        return $this->email;
    }

    public function setEmail(Email $email): void {
        $this->email = $email;
    }

    public function getCpf(): Cpf {
        return $this->cpf;
    }
}