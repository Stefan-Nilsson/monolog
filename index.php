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

$log->pushHandler(new StreamHandler(__DIR__ . '/logs/info.log', Logger::WARNING));
// add records to the log
$log->warning('Foo');
$log->error('Bar');
$input = ($_GET['input']);
switch ($_GET['type']) {
    CASE 'DEBUG':
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/debug.log', Logger::DEBUG));
        $log->pushHandler(new BrowserConsoleHandler(logger:: DEBUG));
        break;

    CASE 'NOTICE':
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/notice.log', Logger::NOTICE));
        $log->pushHandler(new BrowserConsoleHandler(logger:: NOTICE));
        break;
    CASE 'WARNING':
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/warning.log', Logger::WARNING));
        $log->pushHandler(new BrowserConsoleHandler(logger:: WARNING));

    CASE 'ERROR':
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/error.log', Logger::ERROR));

    CASE 'CRITICAL':
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/critical.log', Logger::CRITICAL));

    CASE 'ALERT':
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/alert.log', Logger::ALERT));

    CASE 'EMERGENCY':
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/emergency.log', Logger::EMERGENCY));
}


require('buttons.html');