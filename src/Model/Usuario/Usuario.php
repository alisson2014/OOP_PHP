<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Usuario;
use IntegratedAirlines\Service\Model\Model;

class Usuario extends Model {
    private Email $email;
    private readonly Cpf $cpf;

    public function __construct(
        private string $nome,
        Email $email,
        Cpf $cpf 
    ) {
        $this->setEmail($email);
        $this->cpf = $cpf;
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