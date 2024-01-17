<?php

namespace Main\Zandstra\Chapter8;

use Main\Zandstra\Chapter8\CostStrategy;

class FixedCostStrategy extends CostStrategy
{
    
    public function cost(Lesson $lesson): int
    {
        return 30;
    }
    
    public function chargeType(): string
    {
        return "Фиксированная ставка";
    }
}
