<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Tests\Unit\Model\Pessoa;

use IntegratedAirlines\Service\Model\Pessoa\Email\Email;
use IntegratedAirlines\Service\Model\Pessoa\Email\InvalidEmailException;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailInvalidoDeveLancarExcecao(): void
    {
        $email = "!invalido%";
        $this->expectException(InvalidEmailException::class);
        $this->expectExceptionMessage("Erro, email: \"{$email}\" inválido!");

        new Email($email);
    }

    public function testEmailToString(): void
    {
        $email = new Email("emailvalido@host.com");
        
        $emailText = (string)$email;
        $this->assertIsString($emailText);  
        $this->assertSame("emailvalido@host.com", $emailText);     
    }
}
