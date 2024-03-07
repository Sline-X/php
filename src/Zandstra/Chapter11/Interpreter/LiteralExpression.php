<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Interpreter;

use Main\Zandstra\Chapter11\Interpreter\Expression;

class LiteralExpression extends Expression
{
    private mixed $value;
    
    public function __construct(mixed $value)
    {
        $this->value = $value;
    }
    public function interpret(InterpreterContext $context)
    {
        $context->replace($this, $this->value);
    }
}
