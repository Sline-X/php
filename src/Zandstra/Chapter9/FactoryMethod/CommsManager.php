<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter9\FactoryMethod;

class CommsManager
{
    public const BLOGGS = 1;
    public const MEGA = 2;
    
    public function __construct(private int $mode)
    {
    }
    public function getAppEncoder(): ApptEncoder
    {
        switch ($this->mode)
        {
            case (self::MEGA):
                return new MegaApptEncoder();
                
            default:
                return new BloggsApptEncoder();
        }
    }
}
