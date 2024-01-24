<?php

use Main\Zandstra\Chapter9\CluedUp;
use Main\Zandstra\Chapter9\Employee;
use Main\Zandstra\Chapter9\FactoryMethod\BloggsCommsManager;
use Main\Zandstra\Chapter9\FactoryMethod\CommsManager;
use Main\Zandstra\Chapter9\Minion;
use Main\Zandstra\Chapter9\NastyBoss;

require __DIR__ .'/vendor/autoload.php';

// $boss = new NastyBoss();
// $boss->addEmployee("Игорь");
// $boss->addEmployee("Владимир");
// $boss->addEmployee("Мария");

// $boss->addEmployee(new Minion("Игорь"));
// $boss->addEmployee(new CluedUp("Владимир"));
// $boss->addEmployee(new Minion("Мария"));

// $boss->addEmployee(Employee::recruit("Игорь"));
// $boss->addEmployee(Employee::recruit("Владимир"));
// $boss->addEmployee(Employee::recruit("Мария"));
// $boss->projectFails();
// $boss->projectFails();
// $boss->projectFails();

// $man = new CommsManager(CommsManager::MEGA);
// print_r(get_class($man->getAppEncoder())) . "\n";
// $man = new CommsManager(CommsManager::BLOGGS);
// print_r(get_class($man->getAppEncoder())) . "\n";

$mgr = new BloggsCommsManager();
print $mgr->getHeaderText();
print $mgr->getAppEncoder()->encode();
print $mgr->getFooterText();
