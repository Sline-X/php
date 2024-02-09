<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter10\Composite;

use Main\Zandstra\Chapter10\Cavalry;

class TroopCarrier extends CompositeUnit
{
    /**
     * @throws \Main\Zandstra\Chapter10\Composite\UnitException
     */
    public function addUnit(Unit $unit): void
    {
        if ($unit instanceof Cavalry)
        {
            throw new UnitException('Лошади не ездят на БТР');
        }
        
        parent::addUnit($unit);
    }
    
    public function bombardStrength(): int
    {
        return 0;
    }
}
