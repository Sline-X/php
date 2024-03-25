<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Observer;

use Main\Zandstra\Chapter11\Observer\Observer;

class LoginAnalytics implements Observer
{
    
    public function update(Observable $observable): void
    {
       // Небезопасно с точки зрения типов!
        $status = $observable->getStatus();
        print __CLASS__ . ": обработка информации о состоянии\n";
    }
    
    public function test($test): void
    {
    
    }
}
