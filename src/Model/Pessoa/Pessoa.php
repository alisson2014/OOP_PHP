<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Pessoa;

abstract class Pessoa
{
    protected string $nome;
    protected readonly Cpf $cpf;
    protected Email $email;

    public function __construct(string $nome, Cpf $cpf, Email $email)
    {
        if(!$this->validaNome($nome)) {
            return;
        }

        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
    }

    protected function getNome(): string
    {
        return $this->nome;
    }

    protected function getCpf(bool $toString = true): string|Cpf
    {
        return $toString ? (string)$this->cpf : $this->cpf;
    }

    protected function getEmail($toString = true): string|Email
    {
        return $toString ? (string)$this->email : $this->email;
    }

    protected function setName(string $novoName): void
    {
        if(!$this->validaNome($novoName)) {
            return;
        }
        
        $this->nome = $novoName;
    }

    final protected function validaNome(string $name): bool
    {
        if (mb_strlen($name) < 5) {
            throw new \InvalidArgumentException("Erro, nome deve conter 5 ou mais caracteres!");
        }

        return true;
    }
}
