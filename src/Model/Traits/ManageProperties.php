<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Traits;

trait ManageProperties
{
    public function __get(string $method): mixed 
    {
        $method = "get" . ucfirst($method);
        return $this->$method();
    }

    public function __set(string $method, string $value): void 
    {
        $method = "set" . ucfirst($method);
        $this->$method($value);
    }
}
