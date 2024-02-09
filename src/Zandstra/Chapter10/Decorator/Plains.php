<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter10\Decorator;

class Plains extends Tile
{
    private int $wealhfactor = 2;
    public function getWealthFactor(): int
    {
        return $this->wealhfactor;
    }
}
