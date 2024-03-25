<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Observer;

use Main\Zandstra\Chapter11\Observer\Observer;

abstract class LoginObserver implements Observer
{
    private Login $login;
    public function __construct(Login $login)
    {
        $this->login = $login;
        $login->attach($this);
    }
    public function update(Observable $observable): void
    {
        if ($observable === $this->login)
        {
            $this->doUpdate($observable);
        }
    }
    abstract public function doUpdate(Login $login): void;
}
