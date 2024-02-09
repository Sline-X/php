<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter10\Decorator;

use Main\Zandstra\Chapter10\Decorator\Plains;

class DiamondPlains extends Plains
{
    public function getWealthFactor(): int
    {
        return parent::getWealthFactor() + 2;
    }
}
