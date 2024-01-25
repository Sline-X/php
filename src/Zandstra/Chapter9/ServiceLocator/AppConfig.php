<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter9\ServiceLocator;

use Main\Zandstra\Chapter9\AbstractFactory\BloggsCommsManager;
use Main\Zandstra\Chapter9\AbstractFactory\CommsManager;

class AppConfig
{
    private static ? AppConfig $instance = null;
    private CommsManager $commsManager;
    private function __construct()
    {
        // Выполняется единственный раз
        $this->init();
    }
    
    private function init(): void
    {
        switch (Settings::$COMMSTYPE)
        {
            case 'Mega':
                $this->commsManager = newCommsManager();
                break;
                
            default:
                $this->commsManager = new BloggsCommsManager();
        }
    }
    
    public static function getInstance(): AppConfig
    {
        if (is_null(self::$instance))
        {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    public function getCommsManager(): CommsManager
    {
        return $this->commsManager;
    }
}
