<?php declare(strict_types=1);

ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

require('vendor/autoload.php');



use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\BrowserConsoleHandler;

// create a log channel
$log = new Logger('logger');
$log->pushHandler(new StreamHandler(__DIR__.'logs/info.log', Logger::WARNING));

// add records to the log
$log->warning('Foo');
$log->error('Bar');

require('buttons.html');