<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Tests\Unit\Model\Pessoa;

use IntegratedAirlines\Service\Model\Pessoa\Cpf\Cpf;
use IntegratedAirlines\Service\Model\Pessoa\Cpf\InvalidCpfException;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testCpfInvalidoDeveLancarExcecao(): void
    {
        $cpf = "!invalido%";
        $this->expectException(InvalidCpfException::class);
        $this->expectExceptionMessage("Erro, cpf: \"{$cpf}\" inválido!");

       new Cpf($cpf); 
    }

    public function testCpfToString(): void
    {
        $cpf = new Cpf("740.962.770-02");
        
        $cpfText = (string)$cpf;
        $this->assertIsString($cpfText);  
        $this->assertSame("740.962.770-02", $cpfText);     
    }
}
