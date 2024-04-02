<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Aeroporto;

use IntegratedAirlines\Service\Interface\ITripulante;
use IntegratedAirlines\Service\Model\Aeronave\Aeronave;
use IntegratedAirlines\Service\Model\Cliente\Cidade;
use IntegratedAirlines\Service\Model\Funcionario\Funcionario;
use IntegratedAirlines\Service\Model\Passageiro\Passageiro;
use SplObjectStorage;

final class Voo
{
    const PREFIXO = 'IA';
    private static int $contador = 0;
    private int $numero;
    private ?SplObjectStorage $tripulantes = null;
    private ?SplObjectStorage $funcionarios = null;

    public function __construct(
        private Aeronave $aeronave,
        private Cidade $destino
    ) {
        self::$contador++;
        $this->numero = self::$contador;
        $this->tripulantes = new SplObjectStorage();
        $this->funcionarios = new SplObjectStorage();
    }

    public function __destruct() 
    {
        self::$contador--;
    }

    public function getCodigoVoo(): string
    {
        return md5(self::PREFIXO . $this->numero);
    }

    public static function getTotalVoos(): int
    {
        return self::$contador;        
    }

    public function getPassageiros(): SplObjectStorage
    {
        return clone $this->tripulantes;
    }

    public function getFuncionarios(): SplObjectStorage
    {
        return clone $this->funcionarios;
    }

    public function getIntegrantes(): int
    {
        return $this->tripulantes->count() + $this->funcionarios->count(); 
    }

    public function add(ITripulante $tripulante): void
    {
        if($tripulante instanceof Funcionario) {
            $this->addFuncionario($tripulante);
        } else if ($tripulante instanceof Passageiro) {
            $this->addPassageiro($tripulante);
        } else {
            throw new \DomainException("Tripulante de tipo inválido");
        }
    }

    private function addPassageiro(Passageiro $passageiro): void
    {
        if($this->atingiuCapacidadeMaxima($passageiro)) {
            throw new MaximoTripulantesException($passageiro);
        }

        $this->tripulantes->attach($passageiro);
    }

    private function addFuncionario(Funcionario $funcionario): void
    {
        if($this->atingiuCapacidadeMaxima($funcionario)) {
            throw new MaximoTripulantesException($funcionario);
        }

        $this->funcionarios->attach($funcionario);
    }

    private function atingiuCapacidadeMaxima(ITripulante $tripulante): bool
    {
        $capacidade = $this->aeronave->getCapacidade(false)->capacidade();
        $isFuncionario = $tripulante instanceof Funcionario ? "funcionarios" : "passageiros";

        return $this->funcionarios->count() >= $capacidade[$isFuncionario];
    }
}