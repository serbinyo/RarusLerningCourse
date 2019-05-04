<?php

/*
Задача 22
Обращение к вложенным массивам выглядит просто, только когда мы уверены в наличии всех ключей, попадающихся по пути:

<?php

$data = [
    'a' => [
        'b' => [
            'c' => 'wow'
        ]
    ]
];

$data['a']['b']['c']; // => wow
Если же наличие данных ключей в массиве не обязательно, тогда код резко усложняется. Каждая попытка обратиться внутрь
должна сопровождаться проверкой:

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
Реализуйте функцию getIn, которая извлекает из массива (который может быть любой глубины вложенности) значение по
указанным ключам. Аргументы:

Исходный массив Массив ключей, по которым ведется поиск значения В случае, когда добраться до значения невозможно,
возвращается null.

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
 */

function getIn(array $array, array $keys)
{
    if (empty($keys)) {
        return null;
    }

    foreach ($array as $key => $sub) {
        if ($key === $keys[0]) {
            if (count($keys) === 1) {
                return $sub;
            }
            if (!is_array($sub)) {
                return null;
            }
            array_shift($keys);
            return getIn($sub, $keys);
        }
    }
}

$data = [
    'user' => 'ubuntu',
    'hosts' => [
        ['name' => 'web1'],
        ['name' => 'web2'],
    ],
];

/* Тестовые запуски

print_r(getIn($data, ['undefined']));        // => null
echo "\n";
print_r(getIn($data, ['user']));             // => 'ubuntu'
echo "\n";
print_r(getIn($data, ['user', 'ubuntu']));   // => null
echo "\n";
print_r(getIn($data, ['hosts', 1, 'name'])); // => 'web2'
echo "\n";
print_r(getIn($data, ['hosts', 0]));         // => ['name' => 'web1']
*/
