<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter11\Interpreter;

abstract class Expression
{
    private static int $keycount = 0;
    private string $key;
    abstract public function interpret(InterpreterContext $context);
    
    public function getkey(): string
    {
        if (!isset($this->key))
        {
            self::$keycount++;
            $this->key = (string)self::$keycount;
        }
        
        return $this->key;
    }
}
