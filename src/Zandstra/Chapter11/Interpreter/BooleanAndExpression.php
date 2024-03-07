<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Interpreter;

use Main\Zandstra\Chapter11\Interpreter\OperatorExpression;

class BooleanAndExpression extends OperatorExpression
{
    
    protected function doInterpret(InterpreterContext $context, $result_l, $result_r): void
    {
        $context->replace($this, $result_l && $result_r);
    }
}
