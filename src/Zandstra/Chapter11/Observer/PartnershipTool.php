<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Observer;

use Main\Zandstra\Chapter11\Observer\LoginObserver;

class PartnershipTool extends LoginObserver
{
    
    public function doUpdate(Login $login): void
    {
        $status = $login->getStatus();
        // Проверка $ip-адреса
        // Установка cookie при соответствии списку
        print __CLASS__ .
            ": Установка cookie при соответствии списку\n";
    }
}
