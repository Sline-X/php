<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter10\Decorator;

use Main\Zandstra\Chapter10\Decorator\Tile;

abstract class TileDecorator extends Tile
{
    protected Tile  $tile;
    public function __construct(Tile $tile)
    {
        $this->tile = $tile;
    }
}
