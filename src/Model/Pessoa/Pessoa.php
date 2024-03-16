<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Pessoa;

/**
 * class Pessoa
 * @package IntegratedAirlines\Service\Model\Pessoa
 * @property string $nome
 * @property-read Cpf $cpf
 * @property-read null|\DateTime $dataNascimento
 * @property Email $email
 * @method string getNome()
 * @method string|Cpf getCpf(bool $toString)
 * @method string|Email getEmail(bool $toString)
 * @method string|\DateTime getDataNascimento(bool $toString = true)
 * @method void setNome(string $novoNome)
 * @method void setEmail(Email $email)
 * @method true validaNome(string $nome)
 */
abstract class Pessoa
{
    protected string $nome;

    public function __construct(
        string $nome, 
        protected readonly Cpf $cpf, 
        protected readonly \DateTime $dataNascimento,
        protected ?Email $email = null,
    ){
        $this->setNome($nome);
    }

    protected function getNome(): string
    {
        return $this->nome;
    }

    protected function getCpf(bool $toString = true): string|Cpf
    {
        return $toString ? (string)$this->cpf : $this->cpf;
    }

    protected function getDataNascimento(bool $toString = true): string|\DateTime
    {
        return $toString ? $this->dataNascimento->format("d/m/Y") : $this->dataNascimento;
    }

    protected function getIdade(): int
    {
        return $this->dataNascimento->diff(new \DateTime('today'))->y;       
    }

    protected function getEmail(bool $toString = true): string|Email
    {
        if(is_null($this->email)) {
            return "Não cadastrado";
        }

        return $toString ? (string)$this->email : $this->email;
    }

    protected function setEmail(Email $email): void
    {
        $this->email = $email;        
    }

    protected function setNome(string $novoNome): void
    {
        $this->validaNome($novoNome);
        $this->nome = $novoNome;
    }

    /** @throws \InvalidArgumentException */
    final protected function validaNome(string $nome): true
    {
        if (mb_strlen($nome) < 5) {
            throw new \InvalidArgumentException("Erro, nome deve conter 5 ou mais caracteres!");
        }

        return true;
    }
}
