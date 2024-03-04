<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter10\DecoratorExample;

class MainProcess extends ProcessRequest
{
    
    public function process(RequestHelper $req): void
    {
        print __CLASS__ . ": выполнение запроса\n";
    }
}
