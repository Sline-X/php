<?php
require __DIR__ .'/vendor/autoload.php';

use Main\Zandstra\Chapter8\Lecture;
use Main\Zandstra\Chapter8\Lesson;
use Main\Zandstra\Chapter8\Seminar;

$lecture = new Lecture(5, Lesson::FIXED);
print "{$lecture->cost()} ({$lecture->chargeType()})\n";
$seminar = new Seminar(3, Lesson::TIMED);
print "{$seminar->cost()} ({$seminar->chargeType()})\n";
