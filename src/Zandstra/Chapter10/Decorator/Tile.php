<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter10\Decorator;

abstract class Tile
{
    abstract public function getWealthFactor(): int;
}
