<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Pessoa;

/**
 * class Pessoa
 * @package IntegratedAirlines\Service\Model\Pessoa
 * @property string $nome
 * @property-read Cpf $cpf
 * @property Email $email
 * @method string getNome()
 * @method string|Cpf getCpf(bool $toString)
 * @method string|Email getEmail(bool $toString)
 * @method void setNome()
 * @method true validaNome()
 */
abstract class Pessoa
{
    protected string $nome;
    protected readonly Cpf $cpf;
    protected Email $email;

    public function __construct(string $nome, Cpf $cpf, Email $email)
    {
        $this->validaNome($nome);

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

    protected function getEmail(bool $toString = true): string|Email
    {
        return $toString ? (string)$this->email : $this->email;
    }

    protected function setNome(string $novoName): void
    {
        $this->validaNome($novoName);
        $this->nome = $novoName;
    }

    /** @throws \InvalidArgumentException */
    final protected function validaNome(string $name): true
    {
        if (mb_strlen($name) < 5) {
            throw new \InvalidArgumentException("Erro, nome deve conter 5 ou mais caracteres!");
        }

        return true;
    }
}
