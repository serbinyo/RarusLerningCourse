<?php

/*
Задача 14

Реализуйте функцию buildDefinitionList, которая генерирует html список определений (теги dl, dt и dd) и возвращает
получившуюся строку.

Параметры функции:

Список определений следующего формата:

<?php

$definitions = [
  ['definition1', 'description1'],
  ['definition2', 'description2']
];

То есть каждый элемент входного списка сам является массивом, содержащим два элемента: термин и его определение.

Пример:

<?php

$definitions = [
    ['Блямба', 'Выпуклость, утолщения на поверхности чего-либо'],
    ['Бобр', 'Животное из отряда грызунов'],
];

buildDefinitionList($definitions);

=> '<dl>
        <dt>Блямба</dt><dd>Выпуклость, утолщение на поверхности чего-либо</dd>
        <dt>Бобр</dt><dd>Животное из отряда грызунов</dd>
    </dl>';
 */

function buildDefinitionList($definitions)
{
    $result = '';
    for ($i = 0; $i < count($definitions); $i++) {
        if ($i === 0) {
            $result .= '<dl>';
        }
        $result .= '<dt>' . $definitions[$i][0] . '</dt><dd>' . $definitions[$i][1] . '</dd>';
        if ($i === count($definitions) - 1) {
            $result .= '</dl>';
        }
    }
    return $result;
}

/* Тестовые запуски

$definitions = [
    ['Блямба', 'Выпуклость, утолщения на поверхности чего-либо'],
    ['Бобр', 'Животное из отряда грызунов'],
];

echo buildDefinitionList($definitions); // =>  <dl><dt>Блямба</dt><dd>Выпуклость, утолщения на поверхности чего-либо</dd><dt>Бобр</dt><dd>Животное из отряда грызунов</dd></dl>
*/
