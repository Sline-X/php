<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Strategy;

abstract class Marker
{
    public function __construct(protected string $test)
    {
    }
    
    abstract public function mark(string $response): bool;
}
