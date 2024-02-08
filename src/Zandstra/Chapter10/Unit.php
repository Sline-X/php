<?php

namespace Main\Zandstra\Chapter10;

abstract class Unit
{
    public function getComposite(): ? CompositeUnit
    {
        return null;
    }
    
    abstract public function bombardStrength(): int;
}
