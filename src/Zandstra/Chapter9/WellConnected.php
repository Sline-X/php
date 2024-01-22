<?php

namespace Main\Zandstra\Chapter9;

use Main\Zandstra\Chapter9\Employee;

class WellConnected extends Employee
{
    
    public function fire(): void
    {
        print "{$this->name}: я позвоню папе\n";
    }
}
