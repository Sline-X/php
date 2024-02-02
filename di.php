<?php

use Main\Zandstra\Chapter9\DependencyInjection\AppointmentMaker2;
use Main\Zandstra\Chapter9\DependencyInjection\ObjectAssembler;
use Main\Zandstra\Chapter9\FactoryMethod\ApptEncoder;
use Main\Zandstra\Chapter9\FactoryMethod\MegaApptEncoder;

require __DIR__ .'/vendor/autoload.php';

$assembler = new ObjectAssembler("src/Zandstra/Chapter9/DependencyInjection/conf.xml");
// $encoder = $assembler->getComponent(ApptEncoder::class);
$apptmaker = $assembler->getComponent(AppointmentMaker2::class);
// $encoder = $assembler->getComponent(MegaApptEncoder::class); //тоже сработает, если не будет в xml файле прописан
// $apptmaker = new AppointmentMaker2($encoder);
$out = $apptmaker->makeAppoinment();
print $out;
