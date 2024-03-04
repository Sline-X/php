<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter10\DecoratorExample;

use Main\Zandstra\Chapter10\DecoratorExample\ProcessRequest;

abstract class DecorateProcess extends ProcessRequest
{
    public function __construct(protected ProcessRequest $processRequest)
    {
    }
}
