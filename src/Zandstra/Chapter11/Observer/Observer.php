<?php

namespace Main\Zandstra\Chapter11\Observer;

interface Observer
{
    public function update(Observable $observable): void;
}
