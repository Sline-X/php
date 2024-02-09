<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter10\Composite;

abstract class CompositeUnit extends Unit
{
    private array $units = [];
    
    public function getComposite(): ? CompositeUnit
    {
        return $this;
    }
    
    public function addUnit(Unit $unit): void
    {
        if (in_array($unit, $this->units, true)) {
            return;
        }
        
        $this->units[] = $unit;
    }
    
    /**
     * @throws \Main\Zandstra\Chapter10\Composite\UnitException
     */
    public function removeUnit(Unit $unit): void
    {
        $idx = array_search($unit, $this->units, true);
        
        if (is_int($idx)) {
            array_splice($this->units, $idx, 1, []);
        }
        
    }
    
    /**
     * @return array
     */
    public function getUnits(): array
    {
        return $this->units;
    }
}
