<?php

use Main\Zandstra\Chapter11\Interpreter\BooleanEqualsExpression;
use Main\Zandstra\Chapter11\Interpreter\BooleanOrExpression;
use Main\Zandstra\Chapter11\Interpreter\InterpreterContext;
use Main\Zandstra\Chapter11\Interpreter\LiteralExpression;
use Main\Zandstra\Chapter11\Interpreter\VariableExpression;
use Main\Zandstra\Chapter11\Observer\GeneralLogger;
use Main\Zandstra\Chapter11\Observer\Login;
use Main\Zandstra\Chapter11\Observer\PartnershipTool;
use Main\Zandstra\Chapter11\Observer\SecurityMonitor;

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

// $markers = [
//     new \Main\Zandstra\Chapter11\Strategy\RegexpMarker("/п.ть/"),
//     new \Main\Zandstra\Chapter11\Strategy\MatchMarker("пять"),
//     new \Main\Zandstra\Chapter11\Strategy\MarkLogicMarker('$input equals "пять"')
// ];
//
// foreach ($markers as $marker)
// {
//     print get_class($marker) . "\n";
//     $question = new \Main\Zandstra\Chapter11\Strategy\TextQuestion("сколько лучей у пятиконечной звезды", $marker);
//
//     foreach (["пять", "четыре"] as $response) {
//         print " Ответ: $response: ";
//
//         if ($question->mark($response)) {
//             print "Верно\n";
//         } else {
//             print "Неверно\n";
//         }
//     }
// }

$login = new Login();
new SecurityMonitor($login);
new GeneralLogger($login);
new PartnershipTool($login);

print_r($login);
