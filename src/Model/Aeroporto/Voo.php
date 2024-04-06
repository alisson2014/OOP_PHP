<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Aeroporto;

use IntegratedAirlines\Service\Interface\ITripulante;
use IntegratedAirlines\Service\Model\Aeronave\Aeronave;
use IntegratedAirlines\Service\Model\Cliente\Cidade;
use IntegratedAirlines\Service\Model\Funcionario\Funcionario;
use IntegratedAirlines\Service\Model\Passageiro\Passageiro;
use SplFixedArray;

final class Voo
{
    const PREFIXO = 'IA';
    private static int $contador = 0;
    private int $numero;
    private ?SplFixedArray $tripulantes = null;
    private ?SplFixedArray $funcionarios = null;

    public function __construct(
        private Aeronave $aeronave,
        private Cidade $destino
    ) {
        self::$contador++;
        $this->numero = self::$contador;

        $capacidade = $this->aeronave->getCapacidade(false)->capacidade();

        $this->tripulantes = new SplFixedArray($capacidade['passageiros']);
        $this->funcionarios = new SplFixedArray($capacidade['funcionarios']);
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

    public function getPassageiros(): SplFixedArray
    {
        return clone $this->tripulantes;
    }

    public function getFuncionarios(): SplFixedArray
    {
        return clone $this->funcionarios;
    }

    public function getIntegrantes(): int
    {
        return $this->tripulantes->count() + $this->funcionarios->count(); 
    }

    public function limpaPassageiro(): void
    {
        $tamanho = $this->tripulantes->count();
        for ($i = 0; $i < $tamanho; $i++) {
            $this->tripulantes->offsetUnset($i);
        }    
    }

    public function removePassageiro(int $index): void 
    {
        $this->tripulantes->offsetUnset($index);
    }

    public function removeFuncionario(int $index): void 
    {
        $this->funcionarios->offsetUnset($index);
    }

    public function find(string $cpf, bool $isFuncionario = false): ?ITripulante 
    {
        $vetor = $isFuncionario ? $this->funcionarios : $this->tripulantes;

        $soCpf = [];
        foreach($vetor->toArray() as $i => $tripulante) {
            if(is_null($tripulante)) {
                continue;
            }

            $soCpf[$i] = (string)$tripulante->cpf;
        }

        $index = array_search($cpf, $soCpf, true);

        return $this->funcionarios->offsetGet($index);
    }

    public function addAll(array $tripulantes): void
    {
        if(count($tripulantes) === 0) {
            return;
        }        

        foreach($tripulantes as $tripulante) {
            $this->add($tripulante);
        }
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
        $index = $this->possuiCapacidade($passageiro);
        if($index === false) {
            throw new MaximoTripulantesException($passageiro);
        }

        $this->tripulantes->offsetSet($index, $passageiro);
    }

    private function addFuncionario(Funcionario $funcionario): void
    {
        $index = $this->possuiCapacidade($funcionario);
        if($index === false) {
            throw new MaximoTripulantesException($funcionario);
        }

        $this->funcionarios->offsetSet($index, $funcionario);
    }

    private function possuiCapacidade(ITripulante $tripulante): false|int
    {
        $array = $tripulante instanceof Funcionario ? $this->funcionarios : $this->tripulantes;

        foreach($array as $index => $funcionario) {
            if(!is_null($funcionario)) {
                continue;
            }

            return $index;
        }

        return false;
    }
}