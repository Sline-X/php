<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Observer;

use Main\Zandstra\Chapter11\Observer\LoginObserver;

class GeneralLogger extends LoginObserver
{
    
    public function doUpdate(Login $login): void
    {
        $status = $login->getStatus();
        // Добавление данных о входе в журнал
        print __CLASS__ . ": добавление данных о входе в журнал\n";
    }
}
