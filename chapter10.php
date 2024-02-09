<?php

use Main\Zandstra\Chapter10\Composite\Archer;
use Main\Zandstra\Chapter10\Composite\Army;
use Main\Zandstra\Chapter10\Composite\LaserCannonUnit;
use Main\Zandstra\Chapter10\Decorator\PollutedPlains;

require __DIR__ .'/vendor/autoload.php';

//создание армии
$main_army = new Army();

// добавление юнитов
$main_army->addUnit(new Archer());
$main_army->addUnit(new LaserCannonUnit());

//создание новой армии
$sub_army = new Army();
$sub_army->addUnit(new Archer());
$sub_army->addUnit(new Archer());
$sub_army->addUnit(new Archer());

//добавление второй армии в первую
$main_army->addUnit($sub_army);

print "Атака с силой: {$main_army->bombardStrength()}\n";

//decorator

// $tile = new PollutedPlains();
// print $tile->getWealthFactor();
