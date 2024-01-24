<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter9\FactoryMethod;

class MegaApptEncoder extends ApptEncoder
{
    
    public function encode(): string
    {
        return "Данные о встрече в формате MegaCal\n";
    }
}
