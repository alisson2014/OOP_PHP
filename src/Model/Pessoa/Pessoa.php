<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Pessoa;

use IntegratedAirlines\Service\Model\Pessoa\Cpf\Cpf;
use IntegratedAirlines\Service\Model\Pessoa\Email\Email;
use IntegratedAirlines\Service\Model\Traits\ManageProperties;

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
    use ManageProperties;

    protected string $nome;

    public function __construct(
        string $nome, 
        protected readonly Cpf $cpf, 
        protected readonly \DateTime $dataNascimento,
        protected ?Email $email = null,
    ){
        $this->setNome($nome);
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCpf(bool $toString = true): string|Cpf
    {
        return $toString ? (string)$this->cpf : $this->cpf;
    }

    public function getDataNascimento(bool $toString = true): string|\DateTime
    {
        return $toString ? $this->dataNascimento->format("d/m/Y") : $this->dataNascimento;
    }

    public function getIdade(): int
    {
        return $this->dataNascimento->diff(new \DateTime('today'))->y;       
    }

    public function getEmail(bool $toString = true): null|string|Email
    {
        $return = $toString && !is_null($this->email);
        return $return ? (string)$this->email : $this->email;
    }

    public function setEmail(Email $email): void
    {
        $this->email = $email;        
    }

    public function setNome(string $novoNome): void
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

    public function __toString(): string
    {
        return sprintf(
            "Nome: %s\nCpf: %s\nEmail: %s\nData nascimento: %s\nIdade: %d\n",
            $this->nome, $this->getCpf(), $this->getEmail(), $this->getDataNascimento(), $this->getIdade()
        );
    }
}
