<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter9\DependencyInjection;

use Main\Zandstra\Chapter9\FactoryMethod\BloggsApptEncoder;

class AppointmentMaker
{
    public function makeAppointment(): string
    {
        //@TODO Variable $encoder is redundant. Refactor to: return (new BloggsApptEncoder())->encode();
        $encoder = new BloggsApptEncoder();
        return $encoder->encode();
    }
}
