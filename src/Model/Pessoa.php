<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model;

abstract class Pessoa
{
    protected string $nome;
    protected readonly string $cpf;

    public function __construct(string $nome, string $cpf)
    {
        $isNomeValido = $this->validaNome($nome);
        $isCpfValido = $this->validaCpf($cpf);

        if ($isNomeValido && $isCpfValido) {
            $this->nome = $nome;
            $this->cpf = $cpf;
        }
    }

    protected function getNome(): string
    {
        return $this->nome;
    }

    protected function getCpf(): string
    {
        return $this->cpf;
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

    final protected function validaCpf(string $cpf): bool
    {
        $cpf = filter_var($cpf, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);

        if ($cpf === false) {
            throw new \InvalidArgumentException("Erro, cpf inválido!");
        }

        return true;
    }
}
