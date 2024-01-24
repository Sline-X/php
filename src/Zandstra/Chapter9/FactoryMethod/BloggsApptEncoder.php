<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter9\FactoryMethod;

class BloggsApptEncoder extends ApptEncoder
{
    
    public function encode(): string
    {
        return "Данные о встрече в формате BloggsCal\n";
    }
}
