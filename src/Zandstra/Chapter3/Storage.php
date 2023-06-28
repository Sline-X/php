<?php

namespace Main\Zandstra\Chapter3;

class Storage
{
    public function add(string $key, string|bool|null $value)
    {

    }
    
    public function add2(string $key, ?string $value) //принимает либо строку, либо null
    {
    
    }
    
    public function getPrice(): int|float
    {
        return ($this->price - $this->discount);
    }
    
    public function setDiscount(int|float $num): void
    {
        $this->discount = $num;
    }
}
