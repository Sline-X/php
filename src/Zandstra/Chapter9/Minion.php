<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter9;

class Minion extends Employee
{
    
    public function fire(): void
    {
        print "{$this->name}: я уберу со стола\n";
    }
}
