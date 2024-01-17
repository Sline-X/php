<?php

namespace Main\Zandstra\Chapter8;
abstract class Lesson
{
    public const FIXED = 1;
    public const TIMED = 2;
    
    public function __construct(protected int $duration, private int $costtype = 1)
    {
    
    }
    
    public function cost(): int
    {
        switch ($this->costtype)
        {
            case self::TIMED:
                return (5 * $this->duration);
                break;
            case self::FIXED:
                return 30;
                break;
                
            default:
                $this->costtype = self::FIXED;
                return 30;
        }
    }
    
    public function chargeType(): string
    {
        switch ($this->costtype)
        {
            case self::TIMED:
                return "Почасовая оплата";
                break;
            
            case self::FIXED:
                return "Фиксированная ставка";
                break;
            
            default:
                $this->costtype = self::FIXED;
                return "Фиксированная ставка";
        }
    }
}
