<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter10\DecoratorExample;

abstract class ProcessRequest
{
    abstract public function process(RequestHelper $req): void;
}
