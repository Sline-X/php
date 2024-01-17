<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter8\Decoupling;

use Main\Zandstra\Chapter8\Decoupling\Notifier;

class TextNotifier extends Notifier
{
    
    public function inform($message): void
    {
        print "Уведомление текстом: {$message}\n";
    }
}
