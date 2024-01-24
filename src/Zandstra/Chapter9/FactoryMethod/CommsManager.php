<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter9\FactoryMethod;

abstract class CommsManager
{
    abstract public function getAppEncoder(): ApptEncoder;
    
    abstract public function getHeaderText(): string;
    
    abstract public function getFooterText(): string;
}
