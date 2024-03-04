<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter10\DecoratorExample;

use Main\Zandstra\Chapter10\DecoratorExample\DecorateProcess;

class AuthenticateRequest extends DecorateProcess
{
    
    public function process(RequestHelper $req): void
    {
        print __CLASS__ . ": запрос аутентификации\n";
        $this->processRequest->process($req);
    }
}
