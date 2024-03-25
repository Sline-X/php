<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Observer;

use Main\Zandstra\Chapter11\Observer\LoginObserver;

class SecurityMonitor extends LoginObserver
{
    
    public function doUpdate(Login $login): void
    {
        $status = $login->getStatus();
        
        if ($status[0] == Login::LOGIN_WRONG_PASS) {
            // отправление письма сисадмину
            print __CLASS__ . ": письмо сисадмину\n";
        }
    }
}
