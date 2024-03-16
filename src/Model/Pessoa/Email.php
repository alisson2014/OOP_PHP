<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Pessoa;

/**
 * class Email
 * @package IntegratedAirlines\Service\Model\Pessoa
 * @property string $email
 * @method void setEmail(string $email)
 * @method bool valida(string $email)
 */
final class Email
{
    private string $email;

    public function __construct(string $email)
    {
        $this->setEmail($email);
    }

    public function __toString(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        if(!$this->valida($email)) {
            throw new \InvalidArgumentException("Erro, email: {$email} inválido!");
        }

        $this->email = $email;
    }

    private function valida(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}