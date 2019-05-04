# Задание - выполнить 60 задач. Результат 92.5

Оценка по задачам:
* Задачи 1-41 - 41 балл (за каждую выполненную задачу по 1 баллу)
* Задачи 42-56 - 45 баллов (за каждую выполненную задачу по 3 балла)
* Задачи 57-60 - 14 баллов (за задачу 60 - 5 баллов, за остальные по 3 балла)

То есть за выполнение всех задач можно получить 100 баллов.

Срок выполнения 1 неделя.
За каждый просроченный день выполнения минус 10 баллов от максимальной оценки.


## Задача 1
Палиндром — число, слово или текст, одинаково читающееся в обоих направлениях. Например: "радар", "топот".

Реализуйте функцию isPalindrome, которая принимает на вход слово, определяет является ли оно палиндромом и возвращает логическое значение.

Для определения является ли слово палиндромом, достаточно сравнивать попарно символ с обоих концов слова. Если они все равны, то это палиндром. Решите задачу без использования реверса строки.

Примеры использования:

```
<?php

isPalindrome('radar'); // true
isPalindrome('maam'); // true
isPalindrome('a');     // true
isPalindrome('abs');   // false
```

## Задача 2

Реализуйте функцию isPalindrome, которая принимает на вход слово, определяет является ли оно палиндромом и возвращает логическое значение.

В отличии от предыдущей реализации, выполните эту более простым способом, через сравнение исходной строки с ее перевернутой версией. Если они между собой равны, значит это палиндром.

## Задача 3

Реализуйте функцию reverse, которая переворачивает цифры в переданном числе:
```
<?php

use function Number\reverse;

reverse(13); // 31
reverse(-123); // -321
```

Не забудьте задать тип входного и выходного аргумента.

## Задача 4

Реализуйте функцию swap, которая меняет местами переданные аргументы по ссылке.

```
<?php

$a = 5;
$b = 8;
swap($a, $b);

print_r($a); // 8
print_r($b); // 5
```

Дополнительным плюсом будет реализация задачи без использования дополнительных переменных

## Задача 5

Написать функцию, решающую квадратичное уравнение через дискриминант
https://ru.wikipedia.org/wiki/%D0%9A%D0%B2%D0%B0%D0%B4%D1%80%D0%B0%D1%82%D0%B8%D1%87%D0%BD%D0%B0%D1%8F_%D1%84%D1%83%D0%BD%D0%BA%D1%86%D0%B8%D1%8F

## Задача 6

Реализуйте функцию get, которая излекает из массива элемент по указанному индексу, если индекс существует, либо возвращает значение по умолчанию. Функция принимает на вход три аргумента:

Массив
Индекс
Значение по умолчанию (которое по умолчанию равно null)
Пример:
```
<?php

use function App\Arrays\get;

$cities = ['moscow', 'london', 'berlin', 'porto'];

get($cities, 1); // => london
get($cities, 4); // => null
get($cities, 10, 'paris'); // => paris
```

## Задача 7

Реализуйте функцию addPrefix, которая добавляет к каждому элементу массива переданный префикс и возвращает получившийся массив. Функция предназначена для работы со строковыми элементами. Аргументы:

Массив
Префикс
После префикса автоматически добавляется пробел.
```
<?php

use function App\Arrays\addPrefix;

$names = ['john', 'smith', 'karl'];

$newNames = addPrefix($names, 'Mr');
print_r($newNames);
// => ['Mr john', 'Mr smith', 'Mr karl'];
```

## Задача 8

Реализуйте функцию swap, которая меняет местами два элемента относительно переданного индекса. Например, если передан индекс 5, то функция меняет местами элементы, находящиеся по индексам 4 и 6.

Параметры функции:

Массив
Индекс
Если хотя бы одного из индексов не существует, функция возвращает исходный массив.
```
<?php

use function App\Arrays\swap;

$names = ['john', 'smith', 'karl'];

$result = swap($names, 1);
print_r($result); // => ['karl', 'smith', 'john']

$result = swap($names, 2);
print_r($result); // => ['john', 'smith', 'karl']
```

## Задача 9

Реализуйте функцию calculateAverage, которая высчитывает среднее арифметическое элементов массива.
```
<?php

$temperatures = [37.5, 34, 39.3, 40, 38.7, 41.5];

calculateAverage($temperatures); // => 38.5
```
В случае пустого массива функция должна вернуть значение null (используйте в коде для этого guard expression):

```
<?php

$temperatures = [];

calculateAverage($temperatures); // => null
```

## Задача 10

Реализуйте функцию isContinuousSequence, которая проверяет, является ли переданная последовательность целых чисел - возрастающей непрерывно (не имеющей пропусков чисел). Например, последовательность [4, 5, 6, 7] - непрерывная, а [0, 1, 3] - нет. Последовательность может начинаться с любого числа, главное условие - отсутствие пропусков чисел.
```
<?php

isContinuousSequence([10, 11, 12, 13]);     // => true
isContinuousSequence([10, 11, 12, 14, 15]); // => false
isContinuousSequence([1, 2, 2, 3]);         // => false
isContinuousSequence([]);                   // => false
```

## Задача 11

Реализуйте функцию findIndex, которая возвращает первый встретившийся индекс переданного элемента в случае, если элемент присутствует в массиве, и -1 в случае, если он отсутствует.

Параметры функции:

Массив
Элемент
```
<?php

$temperatures = [37.5, 34, 39.3, 40, 38.7, 41.5, 40];

findIndex($temperatures, 34); // => 1
findIndex($temperatures, 40); // => 3
findIndex($temperatures, 3);  // => -1
```


## Задача 12

Реализуйте функцию getSameParity, которая принимает на вход массив чисел и возвращает новый, состоящий из элементов, у которых такая же чётность, как и у первого элемента входного массива.

Примеры
```
<?php

getSameParity([]);        // => []
getSameParity([1, 2, 3]); // => [1, 3]
getSameParity([1, 2, 8]); // => [1]
getSameParity([2, 2, 8]); // => [2, 2, 8]
```
Подсказки
Проверка чётности - остаток от деления: $item % 2 == 0 — чётное число
Если на вход функции передан пустой массив, то она должна вернуть пустой массив. Проверить массив на пустоту можно с помощью функции empty

## Задача 13

Имеется набор данных, описывающих изменение температуры воздуха в одном городе в течение нескольких суток. Данные представлены массивом, в котором каждый элемент - это массив, содержащий список температур в течение одних суток.

Допустим, у нас есть статистика температур (например, по состоянию на утро, день и вечер) за три дня. Для первого дня значения температур составляют: -5°, 7°, 1°; для второго дня: 3°, 2°, 3°; и для третьего дня: -1°, -1°, 10° . Массив, отражающий такую статистику, будет выглядеть так:

```
<?php

$data = [
    [-5, 7, 1],
    [3, 2, 3],
    [-1, -1, 10],
]
```

Реализуйте функцию getIndexOfWarmestDay, которая находит самый тёплый день (тот, в котором была зарегистрирована максимальная температура) и возвращает индекс этого дня в исходном массиве.

```
<?php

$data = [
    [-5, 7, 1],
    [3, 2, 3],
    [-1, -1, 10],
];

getIndexOfWarmestDay($data); // 2
```
Если на вход поступил пустой массив, то функция должна вернуть null

Подсказки
Поиск максимального числа в массиве можно выполнить, используя функцию max

## Задача 14

Реализуйте функцию buildDefinitionList, которая генерирует html список определений (теги dl, dt и dd) и возвращает получившуюся строку.

Параметры функции:

Список определений следующего формата:
```
<?php

$definitions = [
  ['definition1', 'description1'],
  ['definition2', 'description2']
];
```
То есть каждый элемент входного списка сам является массивом, содержащим два элемента: термин и его определение.

Пример:
```
<?php

$definitions = [
    ['Блямба', 'Выпуклость, утолщения на поверхности чего-либо'],
    ['Бобр', 'Животное из отряда грызунов'],
];

buildDefinitionList($definitions);
```

```html
=> '<dl><dt>Блямба</dt><dd>Выпуклость, утолщение на поверхности чего-либо</dd><dt>Бобр</dt><dd>Живтоное из отряда грызунов</dd></dl>';
```

## Задача 15
Реализуйте функцию makeCensored, которая заменяет каждое вхождение указанных слов в предложении на последовательность $#%! и возвращает полученную строку.

Аргументы:
Текст
Набор стоп слов
Словом считается любая непрерывная последовательность символов, включая любые спецсимволы (без пробелов).
```
<?php

use function App\Strings\makeCensored;

$sentence = 'When you play the game of thrones, you win or you die';
makeCensored($sentence, ['die', 'play']);
// => When you $#%! the game of thrones, you win or you $#%!

$sentence2 = 'chicken chicken? chicken! chicken';
makeCensored($sentence2, ['?', 'chicken']);
// => '$#%! chicken? chicken! $#%!';
```


## Задача 16

Реализуйте функцию getSameCount, которая считает количество общих уникальных элементов для двух массивов. Аргументы:

Первый массив
Второй массив
```
<?php

getSameCount([], []); // => 0
getSameCount([1, 10, 3], [10, 100, 35, 1]); // => 2
getSameCount([1, 3, 2, 2], [3, 1, 1, 2]); // => 3
```

## Задача 17
Реализуйте функцию countUniqChars, которая получает на вход строку и считает, сколько символов (уникальных символов) использовано в этой строке. Например, в строке 'yy' всего один уникальный символ — y. А в строке '111yya!' — четыре уникальных символа: 1, y, a и !.

Задание необходимо выполнить без использования функции array_unique.

Примеры
```
<?php

$text1 = 'yyab';
countUniqChars($text1); // => 3

$text2 = 'You know nothing Jon Snow';
countUniqChars($text2); // => 13

$text3 = '';
countUniqChars($text3); // => 0
```

Примечания
Если передана пустая строка, то функция должна вернуть 0, так как пустая строка вообще не содержит символов.

## Задача 18

Реализуйте функцию bubbleSort, которая сортирует массив используя пузырьковую сортировку. Постарайтесь не подглядывать в текст теории и попробуйте воспроизвести алгоритм по памяти.
```
<?php

use function App\Arrays\bubbleSort;

bubbleSort([]); // => []
bubbleSort([3, 10, 4, 3]); // => [3, 3, 4, 10]
```

## Задача 19

Реализуйте функцию checkIfBalanced, которая проверяет балансировку круглых скобок в арифметических выражениях.

```
<?php

checkIfBalanced('(5 + 6) * (7 + 8)/(4 + 3)'); // => true
checkIfBalanced('(4 + 3))'); // => false
```

## Задача 20
Реализуйте функцию getIntersectionForSortedArray, которая принимает на вход два отсортированных массива и находит их пересечение.
Задачу реализовать двумя способами - используя штатные функции, и перебором элементов массивов
```
<?php

getIntersectionOfSortedArray([10, 11, 24], [10, 13, 14, 18, 24, 30]);
// => [10, 24]
```
Подсказки
Не забудьте поставить проверку на размерность массивов. Если хотя бы один из них пустой, то пересечений нет.

## Задача 21

Обратите внимание на сходство json и ассоциативного массива. Оно не случайно. Json является представлением ассоциативного массива в текстовом виде. Composer во время каждого запуска считывает этот файл.

Реализуйте функцию getComposerFileData, которая возвращет ассоциативный массив, соответствующий json из файла composer.json в этом упражнении.


## Задача 22
Обращение к вложенным массивам выглядит просто, только когда мы уверены в наличии всех ключей, попадающихся по пути:
```
<?php

$data = [
    'a' => [
        'b' => [
            'c' => 'wow'
        ]
    ]
];

$data['a']['b']['c']; // => wow
```
Если же наличие данных ключей в массиве не обязательно, тогда код резко усложняется. Каждая попытка обратиться внутрь должна сопровождаться проверкой:
```
<?php

if (array_key_exists('a', $data)) {
    $inner1 = $data['a'];
    if (array_key_exists('b', $inner1)) {
        $inner2 = $inner1['b'];
        if (array_key_exists('c', $inner2)) {
            // ...
        }
    }
}
```

Реализуйте функцию getIn, которая извлекает из массива (который может быть любой глубины вложенности) значение по указанным ключам. Аргументы:

Исходный массив
Массив ключей, по которым ведется поиск значения
В случае, когда добраться до значения невозможно, возвращается null.
```
<?php

$data = [
    'user' => 'ubuntu',
    'hosts' => [
        ['name' => 'web1'],
        ['name' => 'web2']
    ]
];

getIn($data, ['undefined']);        // => null
getIn($data, ['user']);             // => 'ubuntu'
getIn($data, ['user', 'ubuntu']);   // => null
getIn($data, ['hosts', 1, 'name']); // => 'web2'
getIn($data, ['hosts', 0]);         // => ['name' => 'web1']
```

## Задача 23
Реализуйте функцию pick, которая извлекает из переданного массива все элементы по указанным ключам и возвращает новый массив. Аргументы:

Исходный массив
Массив ключей, по которым должны быть выбраны элементы (ключ и значение) из исходного массива, и на основе выбранных данных сформирован новый массив
```
<?php

$data = [
    'user' => 'ubuntu',
    'cores' => 4,
    'os' => 'linux'
];

pick($data, ['user']);       // → ['user' => 'ubuntu']
pick($data, ['user', 'os']); // → ['user' => 'ubuntu', 'os' => 'linux']
pick($data, []);             // → []
pick($data, ['none']);       // → []
```

## Задача 24
Реализуйте функцию genDiff, которая возвращает ассоциативный массив, в котором каждому ключу из исходных массивов соответствует одно из четырёх значений: added, deleted, changed или unchanged. Аргументы:

Ассоциативный массив
Ассоциативный массив
Расшифровка:
```
added — ключ отсутствовал в первом массиве, но был добавлен во второй
deleted — ключ был в первом массиве, но отсутствует во втором
changed — ключ присутствовал и в первом и во втором массиве, но значения отличаются
unchanged — ключ присутствовал и в первом и во втором массиве с одинаковыми значениями
```
```
<?php

use function App\Arrays\genDiff;

$result = genDiff(
    ['one' => 'eon', 'two' => 'two', 'four' => true],
    ['two' => 'own', 'zero' => 4, 'four' => true]
);
// => [
//     'one' => 'deleted',
//     'two' => 'changed'
//     'zero' => 'added',
//     'four' => 'unchanged',
// ];
```

## Задача 25
Реализуйте функцию getSortedNames, которая принимает на вход список пользователей, извлекает их имена, сортирует и возвращает отсортированный список имен.
```
<?php

$users = [
    ['name' => 'Bronn', 'gender' => 'male', 'birthday' => '1973-03-23'],
    ['name' => 'Reigar', 'gender' => 'male', 'birthday' => '1973-11-03'],
    ['name' => 'Eiegon',  'gender' => 'male', 'birthday' => '1963-11-03'],
    ['name' => 'Sansa', 'gender' => 'female', 'birthday' => '2012-11-03']
];

getSortedNames($users); // => ['Bronn', 'Eiegon', 'Reigar', 'Sansa']
```

## Задача 26
Реализуйте набор функций, для работы со словарём, построенным на хеш-таблице. Для простоты, наша реализация не поддерживает разрешение коллизий.

make() — создаёт новый словарь
set($map, $key, $value) — устанавливает в словарь значение по ключу. Работает и для создания и для изменения. Функция возвращает true, если удалось установить значение, и false — в обратной ситуации. Такое возможно при возникновении коллизий.
get($map, $key, $default = null) — читает значение по ключу.
Функции set и get принимают первым параметром словарь и мутируют его. То есть передача идёт по ссылке.

Для полноценного погружения в тему, считаем, что массив в PHP может использоваться только как индексированный массив.
```php
<?php

$map = Map\make();
$result = Map\get($map, 'key');
print_r($result); // => null

$result = Map\get($map, 'key', 'value');
print_r($result); // => value

Map\set($map, 'key2', 'value2');
$result = Map\get($map, 'key2');
print_r($result); // => value2
```

Подсказки
crc32 — хеш-функция
Индекс по которому будет храниться значение во внутреннем массиве вычисляется так: crc32($key) % 1000. То есть к ключу применяется хеш-функция и берется остаток от деления на тысячу. Это нужно для ограничения размера массива в разумных рамках.

## Задача 27
Реализуйте функцию wordsCount, которая считает количество одинаковых слов в предложении. Результатом функции является ассоциативный массив, в ключах которого слова из исходного текста, а значения это количество повторений.

Пример:
```
<?php

wordsCount(''); // []
wordsCount('  one two one'); // ['one' => 2, 'two' => 1]
wordsCount('  one      two       one     '); // ['one' => 2, 'two' => 1]
```

Подсказки
Разбиение строки по разделителю: explode.
Для проверки строки на "пустоту" можно использовать функцию empty.

## Задача 28
Реализовать задачу из задания 27 в консольном варианте. В качестве исходного текста использовать произведение Толстой Лев - Война и мир. Текст скачаете в интернете.

## Задача 29
Реализуйте функцию sayPrimeOrNot, которая проверяет переданное число на простоту и печатает на экран yes или no.
```
<?php
sayPrimeOrNot(5); // => yes
sayPrimeOrNot(4); // => no
```
Подсказки
Цель этой задачи — научиться отделять чистый код от кода с побочными эффектами.

Для этого выделите процесс определения того, является ли число простым, в отдельную функцию, возвращающую логическое значение. Это функция, с помощью которой мы отделяем чистый код от кода, интерпретирующего логическое значение (как 'yes' или 'no') и делающего побочный эффект (печать на экран).

## Задача 30

Реализуйте функцию average, которая возвращает среднее арифметическое всех переданных аргументов. Если функции не передать ни одного аргумента, то она должна вернуть null.
```
<?php

average(0); // => 0
average(0, 10); // => 5
average(-3, 4, 2, 10); // => 3.25
average(); // => null
```

## Задача 31
Реализуйте функцию union, которая находит объединение всех переданных массивов. Функция принимает на вход от одного массива и больше. Ключи исходных массивов не сохраняются (т.е. все значения итогового массива заново индексируются: 0, 1, 2, ...).
```
<?php

union([3]); // => [3]
union([3, 2], [2, 2, 1]); // => [3, 2, 1]
union(['a', 3, false], [true, false, 3], [false, 5, 8]); // => ['a', 3, false, true, 5, 8]
```
## Задача 32
Слаг - часть адреса сайта которая используется для идентификации ресурса в Человекопонятном виде. Без слага /posts/3, со слагом /posts/my-super-post, где слаг это my-super-post. Слаг обычно генерируется автоматически на основе названия ресурса, например статьи.

Функция выполняющую трансляцию текста в слаг есть и в библиотеке Funct:


Реализуйте функцию slugify. Преобразования которые она должна делать:

Приводить к нижнему регистру все символы в строке
Удалять все пробелы
Соединять слова с помощью дефисов
```
<?php

slugify(''); // ''
slugify('test'); // 'test'
slugify('test me'); // 'test-me'
slugify('La La la LA'); // 'la-la-la-la'
slugify('O la      lu'); // 'o-la-lu'
slugify(' yOu   '); // 'you'
```


## Задача 33
Реализуйте анонимную функцию, которая принимает на вход строку и возвращает ее последний символ (или null если строка пустая). Запишите созданную функцию в переменную $last.
```
<?php

$last(''); // => null
$last('pow'); // => w
$last('kids'); // => s
```
## Задача 34

Реализуйте функцию takeOldest, которая принимает на вход список пользователей и возвращает самых взрослых. Количество возвращаемых пользователей задается вторым параметром, который по-умолчанию равен единице.
```
<?php
$users = [
    ['name' => 'Tirion', 'birthday' => '1988-11-19'],
    ['name' => 'Sam', 'birthday' => '1999-11-22'],
    ['name' => 'Rob', 'birthday' => '1975-01-11'],
    ['name' => 'Sansa', 'birthday' => '2001-03-20'],
    ['name' => 'Tisha', 'birthday' => '1992-02-27']
];

takeOldest($users);
# => Array (
#   ['name' => 'Rob', 'birthday' => '1975-01-11']
# )
```
Подсказки
Для преобразования даты в unixtimestamp используйте функцию strtotime

## Задача 35
Реализуйте функцию getChildren, которая принимает на вход список пользователей и возвращает плоский список их детей. Дети каждого пользователя хранятся в виде массива в ключе children
```
<?php

$users = [
    ['name' => 'Tirion', 'children' => [
        ['name' => 'Mira', 'birdhday' => '1983-03-23']
    ]],
    ['name' => 'Bronn', 'children' => []],
    ['name' => 'Sam', 'children' => [
        ['name' => 'Aria', 'birdhday' => '2012-11-03'],
        ['name' => 'Keit', 'birdhday' => '1933-05-14']
    ]],
    ['name' => 'Rob', 'children' => [
        ['name' => 'Tisha', 'birdhday' => '2012-11-03']
    ]],
];

getChildren($users);
// [
//     ['name' => 'Mira', 'birdhday' => '1983-03-23'],
//     ['name' => 'Aria', 'birdhday' => '2012-11-03'],
//     ['name' => 'Keit', 'birdhday' => '1933-05-14'],
//     ['name' => 'Tisha', 'birdhday' => '2012-11-03']
// ]
```

## Задача 36
Реализуйте функцию getGirlFriends, которая принимает на вход список пользователей и возвращает плоский список подруг всех пользователей (без сохранения ключей). Друзья каждого пользователя хранятся в виде массива в ключе friends. Пол доступен по ключу gender и может принимать значения male или female.
```
<?php

$users = [
    ['name' => 'Tirion', 'friends' => [
        ['name' => 'Mira', 'gender' => 'female'],
        ['name' => 'Ramsey', 'gender' => 'male']
    ]],
    ['name' => 'Bronn', 'friends' => []],
    ['name' => 'Sam', 'friends' => [
        ['name' => 'Aria', 'gender' => 'female'],
        ['name' => 'Keit', 'gender' => 'female']
    ]],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];
```
## Задача 37
Реализуйте функцию getMensCountByYear, которая принимает на вход список пользователей и возвращает массив, в котором ключ это год рождения, а значение это количество мужчин, родившихся в этот год.
```
<?php

$users = [
    ['name' => 'Bronn', 'gender' => 'male', 'birthday' => '1973-03-23'],
    ['name' => 'Reigar', 'gender' => 'male', 'birthday' => '1973-11-03'],
    ['name' => 'Eiegon',  'gender' => 'male', 'birthday' => '1963-11-03'],
    ['name' => 'Sansa', 'gender' => 'female', 'birthday' => '2012-11-03'],
    ['name' => 'Jon', 'gender' => 'male', 'birthday' => '1980-11-03'],
    ['name' => 'Robb','gender' => 'male', 'birthday' => '1980-05-14'],
    ['name' => 'Tisha', 'gender' => 'female', 'birthday' => '2012-11-03'],
    ['name' => 'Rick', 'gender' => 'male', 'birthday' => '2012-11-03'],
    ['name' => 'Joffrey', 'gender' => 'male', 'birthday' => '1999-11-03'],
    ['name' => 'Edd', 'gender' => 'male', 'birthday' => '1973-11-03']
];

getMensCountByYear($users);
# => Array (
#     1973 => 3,
#     1963 => 1,
#     1980 => 2,
#     2012 => 1,
#     1999 => 1
# );
```

Подсказки
Для преобразования даты в Unix Timestamp используйте strtotime.
Для извлечения года из даты используйте функцию date с шаблоном Y.

## Задача 38

Реализуйте функцию getFreeDomainsCount, которая принимает на вход список емейлов, а возвращает количество емейлов, расположенных на каждом бесплатном домене. Список бесплатных доменов хранится в константе FREE_EMAIL_DOMAINS.
```
<?php

$emails = [
    'info@gmail.com',
    'info@yandex.ru',
    'info@hotmail.com',
    'mk@host.com',
    'support@bitrix.com',
    'keys@yandex.ru',
    'sergey@gmail.com',
    'vovan@gmail.com',
    'vovan@hotmail.com'
];

getFreeDomainsCount($emails);
# => Array (
#     'gmail.com' => 3
#     'yandex.ru' => 2
#     'hotmail.com' => 2
#  )
```
## Задача 39

Реализуйте функцию getManWithLessFriends, которая принимает список пользователей и возвращает пользователя, у которого меньше всего друзей.

Примечания
Если список пользователей пустой, то возвращается null
Если в списке есть более одного пользователя с минимальным количеством друзей, то возвращается последний из таких пользователей
Примеры
```
<?php

$users = [
    ['name' => 'Tirion', 'friends' => [
        ['name' => 'Mira', 'gender' => 'female'],
        ['name' => 'Ramsey', 'gender' => 'male']
    ]],
    ['name' => 'Bronn', 'friends' => []],
    ['name' => 'Sam', 'friends' => [
        ['name' => 'Aria', 'gender' => 'female'],
        ['name' => 'Keit', 'gender' => 'female']
    ]],
    ['name' => 'Keit', 'friends' => []],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];

getManWithLessFriends($users);
// => ['name' => 'Keit', 'friends' => []];
```

## Задача 40
Реализуйте функцию without, функция должна принимать любое число аргументов, где первый аргумент массив, а все остальные - значения, которые нужно исключить из переданного массива.
```
<?php

without([3, 4, 10, 4, 'true'], 4); // => [3, 10, 'true']
without(['3', 2], 0, 5, 11); // => ['3', 2]
```
## Задача 41

Реализуйте функцию getDifference, которая принимает на вход два массива, а возвращает массив, составленный из элементов первого, которых нет во втором.

Эту задачу можно решить с помощью функции array_diff, но подразумевается что вы сделаете это без ее использования.
```
<?php

getDifference([2, 1], [2, 3]);
// → [1]
```
## Задача 42
Напишите запрос создающий таблицу courses со следующими полями, запрос обернуть в функцию createTable на php

name типа varchar длинной 255.
body типа text.
created_at типа timestamp.
Напишите запрос создающий таблицу users со следующими полями

first_name типа varchar длинной 255.
email типа varchar длинной 255.
manager типа boolean.
Напишите запрос создающий таблицу course_members со следующими полями

user_id типа integer
course_id типа integer
created_at типа timestamp

## Задача 43
Напишите следующие запросы:

Запрос, который удаляет пользователя с именем Sansa
Запрос, который вставляет в базу пользователя с именем Arya и почтой arya@winter.com
Запрос, который устанавливает флаг manager в true для пользователя с емейлом tirion@got.com

Далее создать функцию php, которая позволит реализовать перечисленные выше запросы

```sql
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    first_name varchar(255),
    email varchar(255),
    manager boolean
);

INSERT INTO users (first_name, email) VALUES
  ('Sansa', 'sansa@winter.com'),
  ('Tirion', 'tirion@got.com');

```
## Задача 44
Составьте запрос, который извлекает все записи из таблицы юзер по следующим правилам:
* Пользователи должны быть рождены позже 23 октября 1999 года. Поле `birthday`.
* Выборка отсортирована в алфавитном порядке по полю `first_name`
* Нужно извлечь только три записи

Далее создать функцию php, которая позволит реализовать перечисленные выше запросы

```sql
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    first_name varchar(255),
    email varchar(255),
    birthday timestamp
);

INSERT INTO users (first_name, email, birthday) VALUES
  ('Sansa', 'sansa@winter.com', '1999-10-23'),
  ('Jon', 'jon@winter.com', '1999-10-07'),
  ('Daenerys', 'daenerys@drakaris.com', '1999-10-23'),
  ('Arya', 'arya@winter.com', '2003-03-29'),
  ('Robb', 'robb@winter.com', '1999-11-23'),
  ('Brienne', 'brienne@tarth.com', '2001-04-04'),
  ('Tirion', 'tirion@got.com', '1975-1-11');
```
## Задача 45
Создайте таблицу cars со следующими полями:
user_first_name - имя пользователя (соответствующее имени в таблице users)
brand - марка машины
model - конкретная модель
Добавьте в таблицу users две произвольные записи. (смотрите структуру таблицы внутри базы)
Добавьте в таблицу cars 5 произвольных записей. Две из них должны указывать на одного пользователя (соответствие по имени пользователя), а три других - на другого.

Далее создать функции php, которые позволит реализовать перечисленные выше запросы

```sql
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    first_name varchar(255),
    last_name varchar(255),
    created_at timestamp
);

```
## Задача 46
Создайте таблицу article_categories с двумя полями:

id - автогенерируемый первичный ключ
name - текстовое поле
Добавьте в эту таблицу две произвольные записи



## Задача 47

Напишите запрос, создающий таблицу users со следующими полями:

id — первичный автогенерируемый ключ.
username — уникально и не может быть null.
email — не может быть null.
created_at — не может быть null.
Напишите запрос, создающий таблицу topics со следующими полями:

id — первичный автогенерируемый ключ.
user_id — внешний ключ.
body — не может быть null.
created_at — не может быть null.

## Задача 48
Напишите запрос обновляющий таблицу структуры:
```
CREATE TABLE users (
  id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
  email varchar(255) NOT NULL,
  age integer,
  name varchar(255)
);
```
В структуру:
```
CREATE TABLE users (
  id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
  email varchar(255) NOT NULL UNIQUE,
  first_name varchar(255) NOT NULL,
  created_at timestamp
);
```

name и first_name - одна и та же колонка.

Таблица для задачи
```sql
DROP TABLE IF EXISTS users CASCADE;
CREATE TABLE users (
  id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
  email varchar(255) NOT NULL,
  age integer,
  name varchar(255)
);

INSERT INTO users (email, age, name) VALUES ('noc@mail.com', 44, 'mike');
```

## Задача 49
Составьте запрос, который извлекает из базы данных все имена (first_name) пользователей, отсортированных по дате рождения в обратном порядке. Те записи у которых нет даты рождения, должны быть в конце списка.

```
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    first_name varchar(255),
    email varchar(255),
    birthday timestamp
);

INSERT INTO users (first_name, email, birthday) VALUES
  ('Sansa', 'sansa@winter.com', '1999-10-23'),
  ('Jon', 'jon@winter.com', '1999-10-07'),
  ('Daenerys', 'daenerys@drakaris.com', NULL),
  ('Arya', 'arya@winter.com', '2003-03-29'),
  ('Robb', 'robb@winter.com', '1999-11-23'),
  ('Brienne', 'brienne@tarth.com', '2001-04-04'),
  ('Tirion', 'tirion@got.com', '1975-1-11');
  ```
## Задача 50
Составьте запрос, который извлекает все записи из таблицы users по следующим правилам:

Пользователи созданы позже 2018-11-23 (включая эту дату) и раньше 2018-12-12 (включая эту дату) или поле house имеет значение stark
Данные отсортированы по дате создания по убыванию


```sql
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    first_name varchar(255),
    email varchar(255),
    house varchar(255),
    birthday timestamp,
    created_at timestamp
);

INSERT INTO users (first_name, email, house, birthday, created_at) VALUES
  ('Sansa', 'sansa@winter.com', 'stark', '1999-10-23', '2018-11-03'),
  ('Jon', 'jon@winter.com', 'stark', '1999-10-07', '2018-10-23'),
  ('Daenerys', 'daenerys@drakaris.com', 'targarien',  '1999-10-23', '2018-12-23'),
  ('Arya', 'arya@winter.com', 'stark', '2003-03-29', '2018-11-18'),
  ('Robb', 'robb@winter.com', 'stark', '1999-11-23', '2018-11-10'),
  ('Brienne', 'brienne@tarth.com', 'ne pomnu', '2001-04-04', '2018-11-28'),
  ('Tirion', 'tirion@got.com', 'lannister', '1975-1-11', '2018-11-23');
```
## Задача 51
Составьте запрос, который извлекает все записи из таблицы users по следующим правилам:

Пользователи должны быть рождены (birthday) раньше 3 октября 2002 года.
Данные отсортированы по имени в прямом порядке
Нужно извлечь 3 строчки, пропустив первые две

```sql
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    first_name varchar(255),
    email varchar(255),
    birthday timestamp
);

INSERT INTO users (first_name, email, birthday) VALUES
  ('Sansa', 'sansa@winter.com', '1999-10-23'),
  ('Jon', 'jon@winter.com', '1999-10-07'),
  ('Daenerys', 'daenerys@drakaris.com', '1999-10-23'),
  ('Arya', 'arya@winter.com', '2003-03-29'),
  ('Robb', 'robb@winter.com', '1999-11-23'),
  ('Brienne', 'brienne@tarth.com', '2001-04-04'),
  ('Tirion', 'tirion@got.com', '1975-1-11');

```
## Задача 52
Составьте запрос, который извлекает все уникальные значения поля house из таблицы users отсортированные по возрастанию

```sql
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    first_name varchar(255),
    email varchar(255),
    house varchar(255),
    birthday timestamp
);

INSERT INTO users (first_name, email, birthday, house) VALUES
  ('Sansa', 'sansa@winter.com', '1999-10-23', 'stark'),
  ('Jon', 'jon@winter.com', '1999-10-07', 'stark'),
  ('Daenerys', 'daenerys@drakaris.com', '1999-10-23', 'targarien'),
  ('Arya', 'arya@winter.com', '2003-03-29', 'stark'),
  ('Robb', 'robb@winter.com', '1999-11-23', 'stark'),
  ('Brienne', 'brienne@tarth.com', '2001-04-04', 'tart'),
  ('Tirion', 'tirion@got.com', '1975-1-11', 'lannister');
```
## Задача 53
Составьте запрос, который извлекает из таблицы users количество записей, у которых значение поля house равно stark.

```sql
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    first_name varchar(255),
    email varchar(255),
    house varchar(255),
    birthday timestamp
);

INSERT INTO users (first_name, email, birthday, house) VALUES
  ('Sansa', 'sansa@winter.com', '1999-10-23', 'stark'),
  ('Jon', 'jon@winter.com', '1999-10-07', 'stark'),
  ('Daenerys', 'daenerys@drakaris.com', '1999-10-23', 'targarien'),
  ('Arya', 'arya@winter.com', '2003-03-29', 'stark'),
  ('Robb', 'robb@winter.com', '1999-11-23', 'stark'),
  ('Brienne', 'brienne@tarth.com', '2001-04-04', 'tart'),
  ('Tirion', 'tirion@got.com', '1975-1-11', 'lannister');
```
## Задача 54
Составьте запрос, который считает количество пользователей рожденных (birthday) в каждом году (из тех что есть в birthday) по следующим правилам:

Анализируются только те пользователи, у которых указан год рождения
Выборка отсортирована по году рождения в прямом порядке

```sql
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id bigint PRIMARY KEY,
  birthday DATE,
  email VARCHAR(255) UNIQUE NOT NULL,
  first_name VARCHAR(50),
  created_at timestamp
);

INSERT INTO users (id, first_name, email, birthday) VALUES
  (1, 'Sansa', 'sansa@winter.com', '1999-10-23'),
  (2, 'Jon', 'jon@winter.com', null),
  (3, 'Daenerys', 'daenerys@drakaris.com', '1999-10-23'),
  (4, 'Arya', 'arya@winter.com', '2003-03-29'),
  (5, 'Robb', 'robb@winter.com', '1999-11-23'),
  (6, 'Brienne', 'brienne@tarth.com', '2001-04-04'),
  (7, 'Tirion', 'tirion@got.com', '1975-1-11');
```

## Задача 55
Составьте запрос, который извлекает из базы идентификатор топика и имя автора топика (first_name) по следующим правилам:

Анализируются топики только тех пользователей, чей емейл находится на домене lannister.com
Выборка отсортирована по дате создания топика в прямом порядке

```sql
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id bigint PRIMARY KEY,
  birthday DATE,
  email VARCHAR(255) UNIQUE NOT NULL,
  first_name VARCHAR(50),
  created_at timestamp
);

INSERT INTO users (id, first_name, email, birthday) VALUES
  (1, 'Sansa', 'sansa@winter.com', '1999-10-23'),
  (2, 'Jon', 'jon@winter.com', '1999-10-07'),
  (3, 'Daenerys', 'daenerys@drakaris.com', '1999-10-23'),
  (4, 'Arya', 'arya@winter.com', '2003-03-29'),
  (5, 'Robb', 'robb@winter.com', '1999-11-23'),
  (6, 'Brienne', 'brienne@tarth.com', '2001-04-04'),
  (7, 'Sarsei', 'sarsei@lannister.com', '1975-01-11'),
  (8, 'Bronn', 'bronn@nobody.com', '1998-03-01'),
  (9, 'Tirion', 'tirion@lannister.com', '1980-09-03');

DROP TABLE IF EXISTS topics;
CREATE TABLE topics (
  id bigint PRIMARY KEY,
  user_id bigint REFERENCES users(id) NOT NULL,
  title varchar(255),
  body text,
  created_at TIMESTAMP NOT NULL
);

insert into "topics" ("body", "created_at", "id", "title", "user_id") values ('Cupiditate id animi eveniet consequatur dolor et repudiandae vitae.', '2018-12-06 09:40:17.646', 1, 'beatae voluptatem commodi', 1);
insert into "topics" ("body", "created_at", "id", "title", "user_id") values ('Dolore eos nesciunt. Praesentium consectetur repellendus officia. Commodi quas corporis et ex numquam occaecati rem rem praesentium. Eveniet eos ea non. Eius a libero non soluta aliquid neque laborum tempora.', '2018-12-06 06:33:08.428', 2, 'tempora accusamus nostrum', 2);
insert into "topics" ("body", "created_at", "id", "title", "user_id") values ('vel eius itaque', '2018-12-06 00:20:11.835', 3, 'eaque fugiat consequatur', 3);
insert into "topics" ("body", "created_at", "id", "title", "user_id") values ('id facere eaque', '2018-12-06 14:55:08.990', 4, 'aut exercitationem expedita', 4);
insert into "topics" ("body", "created_at", "id", "title", "user_id") values ('Omnis accusamus voluptatem quo quos iusto. Non inventore asperiores quia optio in. Harum vitae eligendi. Voluptatem laborum omnis rerum sed quis maxime ipsam facilis. Explicabo aut omnis nihil in quod qui. Voluptas cum delectus suscipit quia saepe.', '2018-12-06 11:26:20.572', 5, 'voluptatem soluta similique', 1);
insert into "topics" ("body", "created_at", "id", "title", "user_id") values ('Ut blanditiis est tenetur nemo. Nesciunt quod architecto qui libero vitae veritatis nam velit quo. Et nulla blanditiis enim officia dolore non mollitia quia in.', '2018-12-06 00:46:27.093', 6, 'in facilis quasi', 2);
insert into "topics" ("body", "created_at", "id", "title", "user_id") values ('Odit repudiandae qui deleniti itaque nihil sint. Non est eos incidunt nulla ut. Dolore et assumenda voluptas iusto omnis.', '2018-12-06 00:46:32.712', 7, 'delectus in nihil', 3);
insert into "topics" ("body", "created_at", "id", "title", "user_id") values ('Amet deserunt a eum cum. Eveniet ut quo. Inventore qui cupiditate autem ratione. Doloremque ut consequatur illum et voluptatem delectus voluptas dolorum at. Sapiente consequatur magni illo eum qui.', '2018-12-05 17:10:37.949', 8, 'placeat maiores numquam', 1);
insert into "topics" ("body", "created_at", "id", "title", "user_id") values ('repellendus', '2018-12-06 12:36:35.357', 9, 'enim maiores ut', 7);
insert into "topics" ("body", "created_at", "id", "title", "user_id") values ('Nemo voluptas accusamus sed delectus voluptatum.', '2018-12-05 23:36:42.776', 10, 'vero accusantium consectetur', 1);
insert into "topics" ("body", "created_at", "id", "title", "user_id") values ('Maxime sit aut molestiae non nesciunt magnam ad. Aut rerum enim aut laborum et et corporis et aperiam. Qui aut molestias neque ut sequi.', '2018-12-06 08:44:46.846', 11, 'nobis voluptatem officia', 1);
insert into "topics" ("body", "created_at", "id", "title", "user_id") values ('Libero ex aut facere temporibus molestias vel et ratione consectetur. Aspernatur repellat placeat sit optio nihil. Vel sunt numquam quidem harum cumque repellendus voluptatem vel nihil. Est voluptatibus explicabo reprehenderit dolor voluptates. Voluptate sapiente possimus cum esse quidem quo a.', '2018-12-06 09:45:12.285', 12, 'impedit quibusdam aut', 9);
insert into "topics" ("body", "created_at", "id", "title", "user_id") values ('A ipsam minus. Aut expedita nobis quia necessitatibus numquam quis. Neque sapiente delectus corporis labore beatae rerum. Asperiores eos nulla pariatur odio. Expedita aut modi ipsa a et laborum blanditiis dolorem.', '2018-12-05 17:40:37.284', 13, 'debitis iusto blanditiis', 9);

```
## Задача 56

Механизм дружбы в социальных сетях, обычно, реализуется через отдельную таблицу ссылающуюся на обоих пользователей. Когда два человека начинают дружить, то в эту таблицу заносятся сразу две записи:

id	user1_id	user2_id
1	3	10
2	10	3
Такой способ организации данных позволяет работать с понятием "дружба" независимо от того, кто был указан первым, а кто вторым.

solution.sql
Составьте транзакцию, которая создает дружбу между пользователями Tirion и Jon.

```sql
DROP TABLE IF EXISTS friendship;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id bigint PRIMARY KEY,
  first_name varchar(255),
  email varchar(255),
  birthday timestamp
);

CREATE TABLE friendship (
  id bigint PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
  user1_id bigint REFERENCES users(id),
  user2_id bigint REFERENCES users(id)
);

INSERT INTO users (id, first_name, email, birthday) VALUES
  (1, 'Sansa', 'sansa@winter.com', '1999-10-23'),
  (2, 'Jon', 'jon@winter.com', '1999-10-07'),
  (3, 'Daenerys', 'daenerys@drakaris.com', '1999-10-23'),
  (4, 'Arya', 'arya@winter.com', '2003-03-29'),
  (5, 'Robb', 'robb@winter.com', '1999-11-23'),
  (6, 'Brienne', 'brienne@tarth.com', '2001-04-04'),
  (7, 'Tirion', 'tirion@got.com', '1975-1-11');
```
## Задача 57
Реализуйте функцию cd, принимающую на вход два параметра: текущую директорию и путь для перехода. Функция должна вернуть директорию, в которую необходимо перейти.

Пример использования:
```php

<?php

cd('/current/path', '/etc'); // /etc
cd('/current/path', '.././anotherpath'); // /current/anotherpath
```

Правила перехода
Если путь для перехода начинается с /, то он же и является конечным путем (так как абсолютный путь).
.. - на уровень выше
. - та же директория

## Задача 58
Реализуйте функцию rrmdir, удаляющую директорию рекурсивно, то есть вместе со всем своим содержимым.

Подсказка
Одна из возможных реализаций может использовать итераторы.
Воспользуйтесь функцией scandir вместо функции glob.

## Задача 59
еализуйте функцию grep, принимающую на вход два параметра: подстроку для сопоставления и шаблон в формате glob, по которому будет происходить поиск.

Функция должна вернуть список всех строк файлов, в которых содержится подстрока. Поиск должен производиться по всем файлам переданного шаблона.

Пример:
```
<?php

sizeof(grep('test', './*')); // 3
```
## Задача 60
Сериализация — процесс перевода какой-либо структуры данных в последовательность битов. Обратной к операции сериализации является операция десериализации (структуризации) — восстановление начального состояния структуры данных из битовой последовательности.

Функция serialize в php генерирует пригодное для хранения представление переменной. Это полезно для хранения или передачи значений PHP между скриптами без потери их типа и структуры. Для превращения сериализованной строки обратно в PHP-значение существует функция unserialize.

src/App/Serializer.php
Реализуйте функцию dump, которая принимает на вход имя файла и структуру данных. После чего она сериализует эту структуру и записывает в файл.
Реализуйте функцию load, которая принимает на вход имя файла. После этого она читает содержимое файла и проводит десериализацию.
Пример:
```
    Serializer\dump($file, $structure);
    $data = Serializer\load($file);

    $structure == $data;
```


## Типичные ошибки

1. Не внимательно читается текст задачи
Неиспользуемый код в комментариях
 if ($word[$letter] !== $word[$wordLength-$letter-1]) {
            //echo ($word[$letter] . '!='.$word[$wordLength-$letter-1]);
            //echo "\n";
            $answer = false;
        }
Вывод в поток в теле функции
if ($var !== $var2)
    {
        echo 'false';
        return false;
    }
    
2. Названия фцнкций не соответствуют стандарту PSR
function isPalindrome_unicode($str)
{
Некорректное использование операторов сравнения
== и ===
Несколько return в коде
function get ($arr, $i, $default = null)
{
    if(array_key_exists($i, $arr))
    {
        return $arr[$i];
    } elseif (!empty($default)){
        return $default;
    } else {
        return null;
    }
}

3. Вычисление условия оуончания цикла в for
for ($i = 1; $i < count($arr); $i++)
Не проверяется тип переменной перед использованием функций
Warning: max(): Array must contain at least one element in

4. Использование htmlspecialchars там где это не требуется
Задача 14

Выведено

&lt;dl&gt;&lt;dt&gt;X&lt;/dt&gt;&lt;dd&gt;YYYв&lt;/dd&gt;&lt;dt&gt;uieuiuuiweuer&lt;/dt&gt;&lt;dd&gt;EEE&lt;/dd&gt;&lt;dt&gt;Блямба&lt;/dt&gt;&lt;dd&gt;Выпуклость, утолщения на поверхности чего-либо&lt;/dd&gt;&lt;dt&gt;Бобр&lt;/dt&gt;&lt;dd&gt;Животное из отряда грызунов&lt;/dd&gt;&lt;/dl&gt;
Требовалось

<dl><dt>X</dt><dd>YYYв</dd><dt>uieuiuuiweuer</dt><dd>EEE</dd><dt>Блямба</dt><dd>Выпуклость, утолщения на поверхности чего-либо</dd><dt>Бобр</dt><dd>Животное из отряда грызунов</dd></dl>

5. Промежуточное присваивание переменной
function getSameCount($array1, $array2)
{
    $result = array_intersect($array1, $array2);
    return $result;
}

6. Усложнение возвращаемого результата
return ($balance == 0) ? true : false;
Для доступа к символу использовать []
$str{$i}

7. Что тут не так?
function (array $array1, array $array2)
{
    $key2 = 0;
    $intersection = [];
    foreach ($array1 as $value1) {
        while ($value1 >= $array2[$key2]) {
            if ($value1 === $array2[$key2]) {
                $intersection[] = $value1;
            }
            ++$key2;
        }
    }

    return $intersection;
}

8. Отсутствует форматирование кода
function discriminant ($a, $b, $c) {


//вычисляем дискриминант
$D = $b*$b - (4 * $a * $c);


if ($D > 0) {
    $x1 = ($b * (-1) + sqrt($D)) / (2 * $a);
    $x2 = ($b * (-1) - sqrt($D)) / (2 * $a);
} else if ($D < 0) {
    echo 'Корни только комплексные';
} else {
    $x1 = -$b / (2 * $a);
    $x2 = -$b / (2 * $a);
}

$roots = array($x1, $x2);
return ($roots);
}

9. Логические ошибки в коде
Что не так с этим кодом?

function wordsCount($str) {
    if (!empty($str)) {
        $str = array_filter(explode(' ', $str));
        
        foreach ($str as $item) {
            if ($item > 0) {
                $str[] = $item;
            }
        }

        $result = array_count_values($str);
    } else {
        $result = [];
    }

    return $result;
}

10. Использование deprecated функций
mb_ereg_*

11. Что не так с этим кодом?
function union()
{
    $result = [];
    foreach (func_get_args() as $arr) {
        $result = array_merge($arr, $result);
    }
    return array_values(array_unique($result));
}

12. Что не так с этим кодом?
function takeOldest($users, $num = 1)
{
    function birth_cmp($user1, $user2)
    {
        $date1 = strtotime($user1['birthday']);
        $date2 = strtotime($user2['birthday']);
        return $date1 - $date2;
    }

    usort($users, 'birth_cmp');

    return array_slice($users, 0, $num);
}

13. Использование модификатора подавления ошибок
$mysqli = @ new mysqli($dblocation, $dbuser, $dbpassword, $db);
Использование root доступов
$dblocation = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
    $db = 'test';
    
14. Преобразование всего запроса SQL
$sql = htmlspecialchars($sql);
или

$tamp = mysqli_real_escape_string($link, $query);

15. Отклонения от рекоменаций PSR
selectFromUsers($mysqli, $date, $sort_field = 'first_name', $sort_direct = 'ASC', $limit = 100)
Не экранируемые переменные
function getQuery($step = 2, $count = 3)
{

    $query = "select * from users where birthday <= '2002-10-03'order by first_name limit " . $step . "," . $count;

    return $query;
}
