<?php

/*
Задача 4 Написать регулярное выражение определяющее является ли данная строчка валидным URL адресом.
В данной задаче правильным URL считаются адреса http и https, явное указание протокола также может
отсутствовать. Учитываются только адреса, состоящие из символов, т.е. IP адреса в качестве URL не
присутствуют при проверке. Допускаются поддомены, указание порта доступа через двоеточие, GET запросы
с передачей параметров, доступ к подпапкам на домене, допускается наличие якоря через решетку.
Однобуквенные домены считаются запрещенными. Запрещены спецсимволы, например «-» в начале и конце имени
домена. Запрещен символ «_» и пробел в имени домена. При составлении регулярного выражения ориентируйтесь
на список правильных и неправильных выражений заданных ниже.

Пример правильных выражений:
http://www.zcontest.ru
http://zcontest.ru
http://zcontest.com
https://zcontest.ru
https://sub.zcontest-ru.com:8080
http://zcontest.ru/dir%201/dir_2/program.ext?var1=x&var2=my%20value
zcon.com/index.html#bookmark

Пример неправильных выражений:
Just Text.
http://a.com
http://www.domain-.com
 */

$url1 = 'http://www.zcontest.ru';
$url2 = 'http://zcontest.ru';
$url3 = 'http://zcontest.com';
$url4 = 'https://zcontest.ru';
$url5 = 'https://sub.zcontest-ru.com:8080';
$url6 = 'http://zcontest.ru/dir%201/dir_2/program.ext?var1=x&var2=my%20value';
$url7 = 'zcon.com/index.html#bookmark';
$url8 = 'Just Text.';
$url9 = 'http://a.com';
$url10 = 'http://www.domain-.com';


function regExpCheck($url)
{
    $regexp = '/^(https?:\/\/)?(www.)?([\w+\-\.]){2,}[^\-\s](\.)(\w+)[:\/]?(\d+)?[\w\?\=\&\.\:\%\/\#]+$/';
    return preg_match($regexp, $url);
}


/**
 * Функция проверки url средствами php
 *
 * Проверяет url c помощью функции filter_var с фильтром FILTER_VALIDATE_URL,
 * но т.к filter_var НЕ пропускает url без протокола, например zcon.com/index.html#bookmark
 * и пропускает http://a.com, что по условию задачи - неправильное поведение,
 * добавлена дополнительная проверка.
 *
 * @param $url
 *
 * @return bool
 */
function phpCheck($url)
{
    if (!in_array(parse_url($url, PHP_URL_SCHEME), ['http', 'https'])) {
        $url = 'http://' . $url;
    }

    if (filter_var($url, FILTER_VALIDATE_URL)) {

        $host = parse_url($url, PHP_URL_HOST);
        $host = explode('.', $host);

        if (mb_strlen($host[0]) > 1) {
            $result = true;
        } else {
            $result = false;
        }

    } else {
        $result = false;
    }

    return $result;
}


//Тестовые запуски

echo regExpCheck($url1) . PHP_EOL;      //1
echo regExpCheck($url2) . PHP_EOL;      //1
echo regExpCheck($url3) . PHP_EOL;      //1
echo regExpCheck($url4) . PHP_EOL;      //1
echo regExpCheck($url5) . PHP_EOL;      //1
echo regExpCheck($url6) . PHP_EOL;      //1
echo regExpCheck($url7) . PHP_EOL;      //1
echo regExpCheck($url8) . PHP_EOL;      //0
echo regExpCheck($url9) . PHP_EOL;      //0
echo regExpCheck($url10) . PHP_EOL;     //0

echo '--------------------' . PHP_EOL;

echo phpCheck($url1) . PHP_EOL;         //true
echo phpCheck($url2) . PHP_EOL;         //true
echo phpCheck($url3) . PHP_EOL;         //true
echo phpCheck($url4) . PHP_EOL;         //true
echo phpCheck($url5) . PHP_EOL;         //true
echo phpCheck($url6) . PHP_EOL;         //true
echo phpCheck($url7) . PHP_EOL;         //true
echo phpCheck($url8) . PHP_EOL;         //false
echo phpCheck($url9) . PHP_EOL;         //false
echo phpCheck($url10) . PHP_EOL;        //false