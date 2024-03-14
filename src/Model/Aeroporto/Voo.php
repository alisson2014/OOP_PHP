<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Aeroporto;

use IntegratedAirlines\Service\Model\Aeronave\Aeronave;
use IntegratedAirlines\Service\Model\Funcionario\Funcionario;
use IntegratedAirlines\Service\Model\Passageiro\{Checkin, Passageiro, Passagem};

final class Voo
{
    private string $prefixo;
    private static int $contador = 0;
    private int $numero;

    public function __construct(
        private Aeronave $aeronave,
        private Cidade $destino,
        private array $tripulantes = [], 
        private array $funcionarios = []
    ) {
        self::$contador++;
        $this->prefixo = 'IA';
        $this->numero = self::$contador;
    }

    public function __destruct() {
        self::$contador--;
    }

    public function getCodigoVoo(): string
    {
        return md5($this->prefixo . $this->numero);
    }

    public static function getTotalVoos(): int
    {
        return self::$contador;        
    }

    public function getIntegrantes(): int
    {
        return count($this->tripulantes) + count($this->funcionarios);       
    }

    public function addTripulante(Passageiro $passageiro): void
    {
        $capacidade = $this->aeronave->getCapacidade()->capacidade();
        if(count($this->tripulantes) >= $capacidade["passageiros"]) {
            throw new \LogicException("O voo atingiu o número máximo de tripulantes.");
        }

        $this->tripulantes[] = $passageiro;
    }

    public function addFuncionario(Funcionario $funcionario): void
    {
        $capacidade = $this->aeronave->getCapacidade()->capacidade();
        if(count($this->funcionarios) >= $capacidade["funcionarios"]) {
            throw new \LogicException("O voo atingiu o número máximo de funcionários.");
        }

        $this->funcionarios[] = $funcionario;
    }
}