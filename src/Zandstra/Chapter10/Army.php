<?php

namespace Main\Zandstra\Chapter10;

class Army extends Unit
{
    /**
     * @var array
     */
    private array $units = [];
    
    /**
     * @param \Main\Zandstra\Chapter10\Unit $unit
     * @return void
     */
    public function addUnit(Unit $unit): void
    {
        if (in_array($unit, $this->units, true)) {
            return;
        }
        $this->units[] = $unit;
    }
    
    /**
     * @return int
     */
    public function bombardStrength(): int
    {
        $ret = 0;
        
        foreach ($this->units as $unit) {
            $ret += $unit->bombardStrength();
        }
        
        return $ret;
    }
    
    /**
     * @param \Main\Zandstra\Chapter10\Unit $unit
     * @return void
     */
    public function removeUnit(Unit $unit): void
    {
        $idx = array_search($unit, $this->units, true);
        if (is_int($idx)) {
            array_splice($this->units, $idx, 1, []);
        }
        
    }
}
