<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Model\Pessoa;

trait ExceptionToString
{
    public function __toString(): string {
        return __CLASS__ . ": [{$this->code}]: {$this->message}" . PHP_EOL;
    }
}
