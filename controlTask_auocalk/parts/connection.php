<?php

require_once __DIR__ . '/../lib/Calklib.php';

use \Doctrine\DBAL;
use function Lib\Calklib\getData\getData;
use function Lib\Calklib\getData\sectionWithRadioBuilder;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$logError = new Logger('Ford_Focus_configurator');
$logError->pushHandler(new StreamHandler(__DIR__ . '/../logs/nodata-errors.log', Logger::ERROR));

$logInfo = new Logger('Ford_Focus_configurator');
$logInfo->pushHandler(new StreamHandler(__DIR__ . '/../logs/customers_choice.log', Logger::INFO));


//Подключение к БД
$config = new DBAL\Configuration();

$connectionParams = [
    'dbname' => 'autocalk',
    'user' => 'stud06',
    'password' => 'stud06',
    'host' => '127.0.0.1',
    'driver' => 'pdo_mysql',
];

try {
    $conn = DBAL\DriverManager::getConnection($connectionParams, $config);
    $conn->query('set names utf8'); // Отправляем кодировку
} catch (DBAL\DBALException $e) {
    $logError->error('Ошибка подключения к БД', [$e]);
}

//Получаем данные для Калькулятора конфигурации
$series = getData($conn, 'series');
$bodytypes = getData($conn, 'bodytype');
$powers = getData($conn, 'power');
$colors = getData($conn, 'color');
$furnishs = getData($conn, 'furnish');
$dops = getData($conn, 'dop');