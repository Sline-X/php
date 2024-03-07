<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Interpreter;

class InterpreterContext
{
    private array $expressionstore = [];
    
    public function replace(Expression $exp, mixed $value): void
    {
        $this->expressionstore[$exp->getkey()] = $value;
    }
    
    public function lookup(Expression $exp): mixed
    {
        return $this->expressionstore[$exp->getkey()];
    }
}
