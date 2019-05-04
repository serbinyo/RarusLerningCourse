<?php

/*
Задача 32
Слаг - часть адреса сайта которая используется для идентификации ресурса в Человекопонятном виде. Без слага
 /posts/3, со слагом /posts/my-super-post, где слаг это my-super-post. Слаг обычно генерируется автоматически на
основе названия ресурса, например статьи.

Функция выполняющую трансляцию текста в слаг есть и в библиотеке Funct:

Реализуйте функцию slugify. Преобразования которые она должна делать:

Приводить к нижнему регистру все символы в строке Удалять все пробелы Соединять слова с помощью дефисов

<?php

slugify(''); // ''
slugify('test'); // 'test'
slugify('test me'); // 'test-me'
slugify('La La la LA'); // 'la-la-la-la'
slugify('O la      lu'); // 'o-la-lu'
slugify(' yOu   '); // 'you'
 */

function slugify($str)
{
    $str = strtolower(trim($str));
    $arr = explode(' ', $str);

    //далее удалим пустые элементы массива
    $arr = array_diff($arr, ['']);
    return implode('-', $arr);
}

/* Тестовые запуски

print_r(slugify('')); // ''
print_r(slugify('test')); // 'test'
print_r(slugify('test me')); // 'test-me'
print_r(slugify('La La la LA')); // 'la-la-la-la'
print_r(slugify('O la      lu')); // 'o-la-lu'
print_r(slugify(' yOu   ')); // 'you'
*/
