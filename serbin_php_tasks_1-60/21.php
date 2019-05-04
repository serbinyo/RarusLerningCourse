<?php

/*
Задача 21
Обратите внимание на сходство json и ассоциативного массива. Оно не случайно. Json является представлением
ассоциативного массива в текстовом виде. Composer во время каждого запуска считывает этот файл.

Реализуйте функцию getComposerFileData, которая возвращет ассоциативный массив, соответствующий json из файла
composer.json в этом упражнении.
 */


function getComposerFileData($pathToComposer)
{
    $json= file_get_contents($pathToComposer);
    return json_decode($json, true);
}

/* Тестовые запуски

$path = 'files/composer.json'; //этот файл есть в репо

print_r(getComposerFileData($path));

Array
(
    [require] => Array
        (
            [symfony/filesystem] => ^4.2
            [symfony/finder] => ^4.2
            [monolog/monolog] => ^1.24
            [doctrine/dbal] => ^2.9
            [symfony/console] => ^4.2
        )

    [autoload] => Array
        (
            [psr-4] => Array
                (
                    [Koterov\Symdyanov\Php7\Dumper\] => koterov/simdyanov/php7/
                )

        )

)
*/
