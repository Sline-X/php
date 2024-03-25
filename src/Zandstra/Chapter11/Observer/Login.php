<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Observer;

use Monolog\Logger;

class Login implements \SplSubject
{
    private \SplObjectStorage $storage;
    
    public const LOGIN_USER_UNKNOWN = 1;
    public const LOGIN_WRONG_PASS = 2;
    public const LOGIN_ACCESS = 3;
    private array $observers = [];
    
    public function __construct()
    {
        $this->storage = new \SplObjectStorage();
    }
    public function handleLogin(string $user, string $pass, string $ip): bool
    {
        $isvalid = false;
        switch (rand(1, 3))
        {
            case 1:
                $this->setStatus(self::LOGIN_ACCESS, $user, $ip);
                $isvalid = true;
                break;
            case 2:
                $this->setStatus(self::LOGIN_WRONG_PASS, $user, $ip);
                $isvalid = false;
                break;
            case 3:
                $this->setStatuus(self::LOGIN_USER_UNKNOWN, $user, $ip);
                $isvalid = false;
        }
        // print "возврат " . (($isvalid) ? "true" : "false") . "\n";
        // Logger::logIP($user, $ip, $this->getStatus());
        $this->notify();
        return $isvalid;
    }
    
    private function setStatus(int $status, string $user, string $ip): void
    {
        $this->status = [$status, $user, $ip];
    }
    
    public function getStatus(): array
    {
        return $this->status;
    }
    
    public function attach(\SplObserver $observer): void
    {
        $this->storage->attach($observer);
    }
    
    public function detach(\SplObserver $observer): void
    {
        $this->storage->detach($observer);
    }
    
    public function notify(): void
    {
        foreach ($this->storage as $observer) {
            $observer->update($this);
        }
    }
}
