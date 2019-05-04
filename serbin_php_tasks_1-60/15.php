<?php

/*
Задача 15

Реализуйте функцию makeCensored, которая заменяет каждое вхождение указанных слов в предложении на последовательность
$#%! и возвращает полученную строку.

Аргументы: Текст Набор стоп слов Словом считается любая непрерывная последовательность символов, включая любые
спецсимволы (без пробелов).

<?php

use function App\Strings\makeCensored;

$sentence = 'When you play the game of thrones, you win or you die';
makeCensored($sentence, ['die', 'play']);
// => When you $#%! the game of thrones, you win or you $#%!

$sentence2 = 'chicken chicken? chicken! chicken';
makeCensored($sentence2, ['?', 'chicken']);
// => '$#%! chicken? chicken! $#%!';

 */

function makeCensored($text, $stop_words)
{
    $text_array = explode(' ', $text);
    for ($i = 0; $i < count($text_array); $i++) {
        for ($stop_index = 0; $stop_index < count($stop_words); $stop_index++) {
            if ($text_array[$i] === $stop_words[$stop_index]) {
                $text_array[$i] = '$#%!';
            }
        }
    }
    $text = implode(' ', $text_array);
    return $text;
}

/* Тестовые запуски

$sentence = 'When you play the game of thrones, you win or you die';
echo makeCensored($sentence, ['die', 'play']) . '<br>';
// => When you $#%! the game of thrones, you win or you $#%!

$sentence2 = 'chicken chicken? chicken! chicken';
echo makeCensored($sentence2, ['?', 'chicken']) . '<br>';
// => '$#%! chicken? chicken! $#%!';
*/
