<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;


//Использование
$fileSystem = new Filesystem();

try {
    $fileSystem->mkdir(sys_get_temp_dir() . '/new');
    echo 'ok';
} catch (IOExceptionInterface $exception) {
    echo 'Ошибка при создании вашего каталога ' . $exception->getPath();
}

