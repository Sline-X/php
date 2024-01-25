<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter9\AbstractFactory;

use Main\Zandstra\Chapter9\FactoryMethod\ApptEncoder;

abstract class CommsManager
{
    abstract public function getHeaderText(): string;
    abstract public function getApptEncoder(): ApptEncoder; //maybe change&
    abstract public function getTtdEncoder(): TtdEncoder;
    abstract public function getContactEncoder(): ContactEncoder;
    abstract public function getFooterText(): string;
}
