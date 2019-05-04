<?php
declare(strict_types=1);

require_once __DIR__ . '/Url.php';

$url = new Url('http://yandex.ru?key=value&key2=value2');
echo $url->getScheme() . PHP_EOL; // http
echo $url->getHost() . PHP_EOL; // yandex.ru
print_r($url->getQueryParams()) . PHP_EOL;
//Array
//(
//    [key] => value
//    [key2] => value2
//)

echo $url->getQueryParam('key') . PHP_EOL; // value
echo $url->getQueryParam('key2', 'lala') . PHP_EOL; // value2
echo $url->getQueryParam('new', 'ehu') . PHP_EOL; // ehu
echo $url->getQueryParam('new') . PHP_EOL; // null