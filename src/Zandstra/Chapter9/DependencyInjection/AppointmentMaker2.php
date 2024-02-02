<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter9\DependencyInjection;

use Main\Zandstra\Chapter9\FactoryMethod\ApptEncoder;

class AppointmentMaker2
{
    public function __construct(private ApptEncoder $encoder)
    {
    }
    
    public function makeAppoinment(): string
    {
        return $this->encoder->encode();
    }
}
