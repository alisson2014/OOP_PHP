<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model;

abstract class Model 
{
    public function __get(string $method): mixed
    {
        $method = "get" . ucfirst($method);
        return $this->$method();
    }

    public function __set(string $method, mixed $value): void
    {
        $method = "set" . ucfirst($method);
        $this->$method($value);
    }
}