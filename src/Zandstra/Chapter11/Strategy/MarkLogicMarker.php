<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Strategy;

use Main\Zandstra\Chapter11\Strategy\Marker;

class MarkLogicMarker extends Marker
{
    private MarkParse $engine;
    
    public function __construct(string $test)
    {
        parent::__construct($test);
        $this->engine = new MarkParse($test);
    }
    
    public function mark(string $response): bool
    {
        return $this->engine->evaluate($response);
    }
}
