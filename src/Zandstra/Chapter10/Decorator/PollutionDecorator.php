<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter10\Decorator;

use Main\Zandstra\Chapter10\Decorator\TileDecorator;

class PollutionDecorator extends TileDecorator
{
    
    public function getWealthFactor(): int
    {
        return $this->tile->getWealthFactor() - 4;
    }
}
