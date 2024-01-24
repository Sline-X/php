<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter9\FactoryMethod;


abstract class ApptEncoder
{
    abstract public function encode(): string;
}
