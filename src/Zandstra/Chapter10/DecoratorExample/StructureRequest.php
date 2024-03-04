<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter10\DecoratorExample;

use Main\Zandstra\Chapter10\DecoratorExample\DecorateProcess;

class StructureRequest extends DecorateProcess
{
    
    public function process(RequestHelper $req): void
    {
        print __CLASS__ . ": данные структурирующего запроса\n";
        $this->processRequest->process($req);
    }
}
