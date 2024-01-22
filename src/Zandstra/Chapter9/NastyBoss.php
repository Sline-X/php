<?php

namespace Main\Zandstra\Chapter9;

class NastyBoss
{
    private array $employees = [];
    
    public function addEmployee(Employee $employeeName): void
    {
        $this->employees[] = $employeeName;
    }
    
    public function projectFails(): void
    {
        if (count($this->employees))
        {
            $emp = array_pop($this->employees);
            $emp->fire();
        }
    }
}
