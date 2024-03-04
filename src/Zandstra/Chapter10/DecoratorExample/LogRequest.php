<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter10\DecoratorExample;

use Main\Zandstra\Chapter10\DecoratorExample\DecorateProcess;

class LogRequest extends DecorateProcess
{
    
    public function process(RequestHelper $req): void
    {
        print __CLASS__ . ": запрос журналирования\n";
        $this->processRequest->process($req);
    }
}
