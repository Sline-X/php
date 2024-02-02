<?php

use Main\Zandstra\Chapter9\DependencyInjection\AppointmentMaker2;
use Main\Zandstra\Chapter9\DependencyInjection\ObjectAssembler;
use Main\Zandstra\Chapter9\FactoryMethod\ApptEncoder;

require __DIR__ .'/vendor/autoload.php';

$assembler = new ObjectAssembler("src/Zandstra/Chapter9/DependencyInjection/conf.xml");
$encoder = $assembler->getComponent(ApptEncoder::class);
$apptmaker = new AppointmentMaker2($encoder);
$out = $apptmaker->makeAppoinment();
print $out;
