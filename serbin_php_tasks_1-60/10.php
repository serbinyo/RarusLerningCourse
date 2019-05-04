<?php

/*
Задача 10

Реализуйте функцию isContinuousSequence, которая проверяет, является ли переданная последовательность целых
чисел - возрастающей непрерывно (не имеющей пропусков чисел). Например, последовательность [4, 5, 6, 7] - непрерывная,
а [0, 1, 3] - нет. Последовательность может начинаться с любого числа, главное условие - отсутствие пропусков чисел.

<?php

isContinuousSequence([10, 11, 12, 13]);     // => true
isContinuousSequence([10, 11, 12, 14, 15]); // => false
isContinuousSequence([1, 2, 2, 3]);         // => false
isContinuousSequence([]);                   // => false

 */

function isContinuousSequence($arr)
{
    if (count($arr) < 2) {
        return false;
    }

    $difference = 0;

    for ($i = 0; $i < count($arr) - 1; $i++) {
        if ($i === 0) {
            $difference = $arr[1] - $arr[0];
        }
        if ($arr[$i + 1] - $arr[$i] !== $difference) {
            return false;
        }
    }

    return true;
}

/* Тестовые запуски

echo isContinuousSequence([10, 11, 12, 13]) . '<br>';     // => true
echo isContinuousSequence([10, 11, 12, 14, 15]) . '<br>';  // => false
echo isContinuousSequence([1, 2, 2, 3]) . '<br>';          // => false
echo isContinuousSequence([]) . '<br>';                    // => false
echo isContinuousSequence([100, 101, 102, 103]) . '<br>';      // => true
echo isContinuousSequence([100, 102, 104, 106]) . '<br>';      // => true тоже непрерывное возрастающий ряд увеличивающийся на 2 каждый раз
*/
