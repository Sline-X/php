<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Observer;

interface Observable
{
    public function attach(Observer $observer): void;
    public function detach(Observer $observer): void;
    public function notify(): void;
}
