<?php

namespace Main\Zandstra\Chapter10\Composite;

abstract class Unit
{
    public function getComposite(): ? CompositeUnit
    {
        return null;
    }
    
    abstract public function bombardStrength(): int;
}
