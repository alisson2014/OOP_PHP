<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Aeroporto;

use IntegratedAirlines\Service\Model\Aeronave\Aeronave;
use IntegratedAirlines\Service\Model\Funcionario\Funcionario;
use IntegratedAirlines\Service\Model\Passageiro\{Passageiro};
use IntegratedAirlines\Service\Model\Tripulante;
use IntegratedAirlines\Service\Service\Checkin;

final class Voo
{
    private string $prefixo = 'IA';
    private static int $contador = 0;
    private int $numero;

    public function __construct(
        private Aeronave $aeronave,
        private Cidade $destino,
        private array $tripulantes = [], 
        private array $funcionarios = []
    ) {
        self::$contador++;
        $this->numero = self::$contador;
    }

    public function __destruct() 
    {
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

    public function add(Tripulante $tripulante): void
    {
        if($tripulante instanceof Funcionario) {
            $this->addFuncionario($tripulante);
        } else if ($tripulante instanceof Passageiro) {
            $this->addTripulante($tripulante);
        } else {
            throw new \DomainException("Tripulante de tipo inválido");
        }
    }

    private function addTripulante(Passageiro $passageiro): void
    {
        $capacidade = $this->aeronave->getCapacidade(false)->capacidade();
        if(count($this->tripulantes) >= $capacidade["passageiros"]) {
            throw new \DomainException("O voo atingiu o número máximo de tripulantes.");
        }

        // if(!Checkin::validar($passageiro, $this->getCodigoVoo())) return;

        $this->tripulantes[] = $passageiro;
    }

    private function addFuncionario(Funcionario $funcionario): void
    {
        $capacidade = $this->aeronave->getCapacidade(false)->capacidade();
        if(count($this->funcionarios) >= $capacidade["funcionarios"]) {
            throw new \DomainException("O voo atingiu o número máximo de funcionários.");
        }

        $this->funcionarios[] = $funcionario;
    }
}