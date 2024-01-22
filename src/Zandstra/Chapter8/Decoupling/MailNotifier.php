<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter8\Decoupling;

use Main\Zandstra\Chapter8\Decoupling\Notifier;

class MailNotifier extends Notifier
{
    
    public function inform($message): void
    {
       print "Уведомление почтой: {$message}\n";
    }
}
