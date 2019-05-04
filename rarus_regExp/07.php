<?php

/*
Задача 7 Написать регулярное выражение определяющее является ли данная строка
валидным E-mail адресом согласно RFC под номером 2822

Пример правильных выражений:
mail@mail.ru
valid@megapochta.com
aa@aa.info

Пример неправильных выражений:
bug@@@com.ru
@val.ru
Just Text2
val@val
val@val.a.a.a.a
12323123@111[]][]
 */

$email1 = 'mail@mail.ru';               //yes
$email2 = 'valid@megapochta.com';       //yes
$email3 = 'aa@aa.info';                 //yes
$email4 = 'bug@@@com.ru';               //no
$email5 = '@val.ru';                    //no
$email6 = 'Just Text2';                 //no
$email7 = 'val@val';                    //no
$email8 = 'val@val.a.a.a.a';            //no
$email9 = '12323123@111[]][]';          //no


function regExpCheck($email)
{
    $regexp = '/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/';
    return preg_match($regexp, $email);
}


/**
 * Функция проверки e-mail средствами php
 *
 * Проверяет e-mail c помощью функции filter_var с фильтром FILTER_VALIDATE_EMAIL,
 * но т.к filter_var пропускает e-mail типа val@val.a.a.a.a, а по условию
 * задачи это недопустимый e-mail, добавлена дополнительная проверка
 *
 * @param $email
 *
 * @return bool
 */
function phpCheck($email)
{
    $result = false;

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $parts = explode('@', $email);
        if (substr_count($parts[1], '.') === 1) {
            $result = true;
        }
    }

    return $result;
}


//Тестовые запуски

echo regExpCheck($email1) . PHP_EOL; //1
echo regExpCheck($email2) . PHP_EOL; //1
echo regExpCheck($email3) . PHP_EOL; //1
echo regExpCheck($email4) . PHP_EOL; //0
echo regExpCheck($email5) . PHP_EOL; //0
echo regExpCheck($email6) . PHP_EOL; //0
echo regExpCheck($email7) . PHP_EOL; //0
echo regExpCheck($email8) . PHP_EOL; //0
echo regExpCheck($email9) . PHP_EOL; //0

echo '--------------------' . PHP_EOL;

echo phpCheck($email1) . PHP_EOL; //true
echo phpCheck($email2) . PHP_EOL; //true
echo phpCheck($email3) . PHP_EOL; //true
echo phpCheck($email4) . PHP_EOL; //false
echo phpCheck($email5) . PHP_EOL; //false
echo phpCheck($email6) . PHP_EOL; //false
echo phpCheck($email7) . PHP_EOL; //false
echo phpCheck($email8) . PHP_EOL; //false
echo phpCheck($email9) . PHP_EOL; //false
