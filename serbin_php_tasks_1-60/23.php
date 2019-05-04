<?php

/*
Задача 23
Реализуйте функцию pick, которая извлекает из переданного массива все элементы по указанным ключам и возвращает новый
массив. Аргументы:

Исходный массив Массив ключей, по которым должны быть выбраны элементы (ключ и значение) из исходного массива, и на
основе выбранных данных сформирован новый массив

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
 */

function pick(array $array, array $keys)
{
    $result = [];
    foreach ($array as $key => $value) {
        foreach ($keys as $needle) {
            if ($key === $needle) {
                $result[$key] = $array[$key];
            }
        }
    }
    return $result;
}

/* Тестовые запуски

$data = [
    'user' => 'ubuntu',
    'cores' => 4,
    'os' => 'linux',
];


print_r(pick($data, ['user']));       // → ['user' => 'ubuntu']
print_r(pick($data, ['user', 'os'])); // → ['user' => 'ubuntu', 'os' => 'linux']
print_r(pick($data, []));             // → []
print_r(pick($data, ['none']));       // → []
*/
