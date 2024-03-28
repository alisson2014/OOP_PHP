<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Tests\Unit\Model\Funcionario;

use IntegratedAirlines\Service\Model\Funcionario\Cargo;
use IntegratedAirlines\Service\Model\Funcionario\Comandante;
use IntegratedAirlines\Service\Model\Pessoa\Cpf\Cpf;
use IntegratedAirlines\Service\Model\Pessoa\Email\Email;
use PHPUnit\Framework\TestCase;

class ComandanteTest extends TestCase
{
    public function testFuncionarioComNomeImcompletoDeveLancarExcecao(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Erro, nome deve conter 5 ou mais caracteres!");

        new Comandante(
            "sua",
            new Cpf("740.962.770-02"), 
            new \DateTime("02-10-2001"), 
            new Email("irineu123@gmail.com")
        );
    }

    public function testCargoDeveSerComandante(): void
    {
        $comandante = new Comandante(
            "Irineu",
            new Cpf("740.962.770-02"), 
            new \DateTime("02-10-2001"), 
            new Email("irineu123@gmail.com")
        );
        $this->assertSame(Cargo::COMANDANTE, $comandante->getCargo(true));
    }
}
