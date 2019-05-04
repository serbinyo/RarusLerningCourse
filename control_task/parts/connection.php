<?php

use \Doctrine\DBAL;

//Подключение к БД
$config = new DBAL\Configuration();

$connectionParams = [
    'dbname' => 'carconst',
    'user' => 'stud06',
    'password' => 'stud06',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
];

$conn = DBAL\DriverManager::getConnection($connectionParams, $config);

$conn->query('set names utf8'); // Отправляем кодировку

$queryBuilder = $conn->createQueryBuilder();