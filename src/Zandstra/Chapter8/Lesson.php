<?php

namespace Main\Zandstra\Chapter8;
abstract class Lesson
{
    public const FIXED = 1;
    public const TIMED = 2;
    
    public function __construct(private int $duration,
        private CostStrategy $costStrategy)
    {
    }
    
    public function cost(): int
    {
        return $this->costStrategy->cost($this);
    }
    
    public function chargeType(): string
    {
        return $this->costStrategy->chargeType();
    }
    
    public function getDuration(): int
    {
        return $this->duration;
    }
    //другие методы Lesson...
}
