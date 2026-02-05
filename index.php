<?php
require __DIR__ .'/vendor/autoload.php';

use Main\Zandstra\Chapter3\Point;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

//create f log channel
$log = new Logger('test');
$log->pushHandler(new StreamHandler('logs/test.log', Level::Debug));

$point = new Point();
$point->setVals(1, 1);
$pointDebug = [
    'x' => $point->getX(),
    'y' => $point->getY()
];
// $log->debug('Class Point', $pointDebug);
// $log->warning('Foo');
// $log->error('Bar');

$logger = new Logger('my_logger');
$logger->pushHandler(new StreamHandler('logs/mylog.log', Level::Debug));
$logger->pushHandler(new FirePHPHandler());

// $logger->info('My logger is now ready');

// $logger->info('Adding a user ');


$logger->pushProcessor(function ($record) {
    $record->extra['dummy'] = 'Hello world!';
    
    return $record;
});

$securityLogger = new Logger('security');
$securityLogger->pushHandler(new StreamHandler('logs/mylog.log', Level::Debug));
$securityLogger->pushHandler(new FirePHPHandler());

$securityLogger = $logger->withName('security');

$logger->info('Adding a new user ', ['username' => 'Maksim']);

