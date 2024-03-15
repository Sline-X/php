<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Strategy;

abstract class Question
{
    public function __construct(protected string $prompt, protected Marker $marker)
    {
    }
    
    public function mark(string $response): bool
    {
        return $this->marker->mark($response);
    }
}
