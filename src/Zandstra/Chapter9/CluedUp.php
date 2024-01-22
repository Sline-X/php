<?php

namespace Main\Zandstra\Chapter9;

use Main\Zandstra\Chapter9\Employee;

class CluedUp extends Employee
{
    
    public function fire(): void
    {
        print "{$this->name}: я вызову адвоката\n";
    }
}
