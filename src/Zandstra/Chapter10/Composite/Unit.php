<?php

namespace Main\Zandstra\Chapter10\Composite;

abstract class Unit
{
    public function getComposite(): ? CompositeUnit
    {
        return null;
    }
    
    abstract public function bombardStrength(): int;
    
    public function textDump($num = 0): string
    {
        $txtout = "";
        $pad = 4 * $num;
        $txtout .= sprintf("%{$pad}s", "");
        $txtout .= get_class($this) . ": ";
        $txtout .= "Огневая мощь: "
            . $this->bombardStrength() . "\n";
        return $txtout;
    }
}
