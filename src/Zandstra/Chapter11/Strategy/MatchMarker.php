<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Strategy;

use Main\Zandstra\Chapter11\Strategy\Marker;

class MatchMarker extends Marker
{
    public function mark(string $response): bool
    {
        return ($this->test == $response);
    }
}
