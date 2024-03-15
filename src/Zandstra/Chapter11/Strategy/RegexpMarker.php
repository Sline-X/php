<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Strategy;

use Main\Zandstra\Chapter11\Strategy\Marker;

class RegexpMarker extends Marker
{
    public function mark(string $response): bool
    {
        return (preg_match("$this->test", $response) === 1);
    }
}
