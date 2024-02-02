<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter9\DependencyInjection;

use Main\Zandstra\Chapter9\FactoryMethod\ApptEncoder;
use Main\Zandstra\Chapter9\FactoryMethod\BloggsApptEncoder;

class AppointmentMaker
{
    private ApptEncoder $encoder;
    #[Inject(ApptEncoder::class)]
    public function setApptEncoder(ApptEncoder $encoder)
    {
        $this->encoder = $encoder;
    }
    public function makeAppointment(): string
    {
        return $this->encoder->encode();
    }
}
