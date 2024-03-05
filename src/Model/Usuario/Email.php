<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Usuario;

use IntegratedAirlines\Service\Model\Model;
use IntegratedAirlines\Service\Service\Validador;

final class Email extends Model
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
        if(!Validador::validaEmail($email)) {
            throw new \InvalidArgumentException("Erro, email: {$email} inválido!");
        }

        $this->email = $email;
    }
}