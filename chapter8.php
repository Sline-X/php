<?php
require __DIR__ .'/vendor/autoload.php';

use Main\Zandstra\Chapter8\Decoupling\RegistrationMgr;
use Main\Zandstra\Chapter8\FixedCostStrategy;
use Main\Zandstra\Chapter8\Lecture;
use Main\Zandstra\Chapter8\Lesson;
use Main\Zandstra\Chapter8\Seminar;
use Main\Zandstra\Chapter8\TimedCostStrategy;

// $lecture = new Lecture(5, Lesson::FIXED);
// print "{$lecture->cost()} ({$lecture->chargeType()})\n";
// $seminar = new Seminar(3, Lesson::TIMED);
// print "{$seminar->cost()} ({$seminar->chargeType()})\n";

// $lessons[] = new Seminar(4, new TimedCostStrategy());
// $lessons[] = new Lecture(4, new FixedCostStrategy());

// foreach ($lessons as $lesson) {
//     print "Оплата за занятие {$lesson->cost()}.";
//     print "Тип оплаты {$lesson->chargeType()}\n";
// }


$lessons1 = new Seminar(4, new TimedCostStrategy());
$lessons2 = new Lecture(4, new FixedCostStrategy());
$mgr = new RegistrationMgr();
$mgr->register($lessons1);
$mgr->register($lessons2);
