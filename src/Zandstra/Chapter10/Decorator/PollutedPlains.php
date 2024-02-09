<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter10\Decorator;

class PollutedPlains extends Plains
{
    public function getWealthFactor(): int
    {
        return parent::getWealthFactor() - 4;
    }
}
