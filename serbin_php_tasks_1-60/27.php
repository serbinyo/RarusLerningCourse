<?php

/*
Задача 27
Реализуйте функцию wordsCount, которая считает количество одинаковых слов в предложении. Результатом функции является
ассоциативный массив, в ключах которого слова из исходного текста, а значения это количество повторений.

Пример:

<?php

wordsCount(''); // []
wordsCount('  one two one'); // ['one' => 2, 'two' => 1]
wordsCount('  one      two       one     '); // ['one' => 2, 'two' => 1]
Подсказки Разбиение строки по разделителю: explode. Для проверки строки на "пустоту" можно использовать функцию empty.
 */

function wordsCount($text)
{
    $array_of_text = explode(' ', $text);

    //избавимся от пустых значений
    $array_to_result = [];
    foreach ($array_of_text as $word) {
        if (!empty($word)) {
            //перед записью слова удалим лишние символы и приведем к нижнему регистру
            $word = strtolower(trim($word, " \t\n\r\0\x0B?.,()!-:;'\"«"));
            $array_to_result[] = $word;
        }
    }

    return array_count_values($array_to_result);
}

/* Тестовые запуски

print_r(wordsCount('')); // []
print_r(wordsCount('  one two one')); // ['one' => 2, 'two' => 1]
print_r(wordsCount('  one      two       one     ')); // ['one' => 2, 'two' => 1]
*/
