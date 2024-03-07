<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Interpreter;

use Main\Zandstra\Chapter11\Interpreter\Expression;

abstract class OperatorExpression extends Expression
{
    public function __construct(protected Expression $l_op, protected Expression $r_op)
    {
    }
    
    public function interpret(InterpreterContext $context)
    {
        $this->l_op->interpret($context);
        $this->r_op->interpret($context);
        $result_l = $context->lookup($this->l_op);
        $result_r = $context->lookup($this->r_op);
        $this->doInterpret($context, $result_l, $result_r);
    }
    
    abstract protected function doInterpret(InterpreterContext $context, $result_l, $result_r): void;
}
