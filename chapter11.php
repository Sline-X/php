<?php

use Main\Zandstra\Chapter11\Interpreter\BooleanEqualsExpression;
use Main\Zandstra\Chapter11\Interpreter\BooleanOrExpression;
use Main\Zandstra\Chapter11\Interpreter\InterpreterContext;
use Main\Zandstra\Chapter11\Interpreter\LiteralExpression;
use Main\Zandstra\Chapter11\Interpreter\VariableExpression;

require __DIR__ .'/vendor/autoload.php';

$context = new InterpreterContext();
$literal = new LiteralExpression('четыре');
$literal->interpret($context);
print $context->lookup($literal) . "\n";

$context = new InterpreterContext();
$myvar = new VariableExpression('input', 'четыре');
$myvar->interpret($context);
print $context->lookup($myvar) . "\n";

$newvar = new VariableExpression('input');
$newvar->interpret($context);
print $context->lookup($newvar) . "\n";

$myvar->setValue("пять");
$myvar->interpret($context);
print $context->lookup($myvar) . "\n";

print $context->lookup($newvar) . "\n";

//$input equals "4" or $input equals "четыре"
$context = new InterpreterContext();
$input = new VariableExpression('input');
$statement = new BooleanOrExpression(
    new BooleanEqualsExpression($input,
    new LiteralExpression('четыре')),
    new BooleanEqualsExpression($input, new LiteralExpression('4'))
);

foreach (["четыре", "4", "52"] as $val) {
    $input->setValue($val);
    print "$val:\n";
    $statement->interpret($context);
    
    if ($context->lookup($statement)) {
        print "Правильный ответ!\n\n";
    } else {
        print "Вы ошиблись!\n\n";
    }
}
