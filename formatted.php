<?php

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\TelegramBotHandler;
use Monolog\Level;
use Monolog\Logger;

require __DIR__ .'/vendor/autoload.php';

$dateFormat = "Y n j, g:i a";

$output = "%datetime% > %level_name% > %message% %context% %extra%\n";

$formatter = new LineFormatter($output, $dateFormat);

$stream = new StreamHandler('logs/mylog.log', Level::Debug);
// $stream->setFormatter($formatter);

$securityLogger = new Logger('error');
// $securityLogger->pushHandler($stream);

// $securityLogger->info('test', ['lalala']);

$tg = new TelegramBotHandler('5831984995:AAHQhTFaPV77mLdQjkY5cEOm8wt8ifXP_3Y', '2098428931');
$securityLogger->pushHandler($tg);

$securityLogger->info('А теперь из энва, еблан');
