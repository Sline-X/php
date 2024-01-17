<?php

namespace Main\Zandstra\Chapter8;

class TimedCostStrategy extends CostStrategy
{
    public function cost(Lesson $lesson): int
    {
        return ($lesson->getDuration() * 5);
    }
    
    public function chargeType(): string
    {
        return "Почасовая оплата";
    }

}
