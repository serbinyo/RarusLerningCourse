<?php

/*
Задача 59

Реализуйте функцию grep, принимающую на вход два параметра: подстроку для сопоставления и шаблон в формате glob,
по которому будет происходить поиск.

Функция должна вернуть список всех строк файлов, в которых содержится подстрока. Поиск должен производиться по
всем файлам переданного шаблона.

Пример:

<?php

sizeof(grep('test', './*')); // 3
 */

function grep($needle, $globPattern)
{
    if (empty($needle)) {
        $result = null;
    } else {
        $result = [];
        foreach (glob($globPattern) as $filename) {
            $data = file($filename);
            foreach ($data as $row) {
                //strpos возвращает False если не нашла, и 0, если нашла в начале строки ибо индекс строки начинается
                // с нуля. А поскольку false и 0 коррелируются, то нужно использовать !== для проверки не только
                // значения но и типа.
                if (mb_strpos($row, $needle) !== false) {
                    $result[] = $row;
                }
            }
        }
        if (empty($result)) {
            $result = null;
        }
    }

    return $result;
}

//попробуем грепать 01.php файл на подстоку isPalin
//print_r(grep('isPalin', './01*'));

/*
Array
(
    [0] => Реализуйте функцию isPalindrome, которая принимает на вход слово, определяет является ли оно палиндромом
    [1] => isPalindrome('radar'); // true
    [2] => isPalindrome('maam'); // true
    [3] => isPalindrome('a');     // true
    [4] => isPalindrome('abs');   // false
    [5] => function isPalindrome($str)
    [6] => echo isPalindrome('abs') . '<br>';   //false
    [7] => echo isPalindrome('maam') . '<br>';  //true
    [8] => echo isPalindrome('aaa') . '<br>';  //true
    [9] => echo isPalindrome('false') . '<br>';  //false
    [10] => echo isPalindrome('radar') . '<br>';  //true
)*/

//а теперь все файлы в папке проекта на эту же подстроку

//print_r(count(grep('isPalin', './*')));  //нашло больше результатов, 44 вхождения (даже в этом файле уже 13 вхождений)

//print_r(grep('', './01*')); //null

//print_r(grep('isPalin', '')); //null