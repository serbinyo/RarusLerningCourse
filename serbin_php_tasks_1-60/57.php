<?php

/*
Задача 57
Реализуйте функцию cd, принимающую на вход два параметра: текущую директорию и путь для перехода.
Функция должна вернуть директорию, в которую необходимо перейти.

Пример использования:


<?php

cd('/current/path', '/etc'); // /etc
cd('/current/path', '.././anotherpath'); // /current/anotherpath
Правила перехода Если путь для перехода начинается с /, то он же и является конечным путем
(так как абсолютный путь). .. - на уровень выше . - та же директория

 */

function cd($current_path, $path)
{
    if (strncmp($path, '/', 1) === 0) {
        $result = $path;
    } else {
        $path_prep = explode('/', $path);
        $step_back = 0;
        $target_directory = [];


        //посчитаем на сколько каталогов нам нужно будет вернуться назад
        foreach ($path_prep as $element) {
            if ($element === '..') {
                $step_back++;
            } else {
                $target_directory[] = $element;
            }
        }
        //Подготовим строку с целевой директорией

        $target_directory = array_diff($target_directory, ['.', '..']);
        $target_dir = implode('/', $target_directory);

        //теперь вычислим путь для перехода
        $current_path_prep = explode('/', $current_path);

        if ($step_back !== 0) {
            $current_path_prep = array_slice($current_path_prep, 0, $step_back * -1);
        }

        //Подготовим строку с путем До целевой директории
        $dir_to_go = implode('/', $current_path_prep);

        $result = $dir_to_go . '/' . $target_dir;

    }

    return $result;
}

/* Тестовые запуски

print_r(cd('/current/path', '/etc') . "\n"); // => /etc
print_r(cd('/current/path', '.././anotherpath') . "\n"); // => /current/anotherpath
print_r(cd('/current/path/folder/too_much_folders', '../.././anotherpath/now_here') . "\n"); // => /current/path/anotherpath/now_here
print_r(cd('/current/path/folder/too_much_folders', '../.././../anotherpath/now_here') . "\n"); // => /current/anotherpath/now_here
print_r(cd('/current/path/folder/too_much_folders', './anotherpath/now_here') . "\n");  /// => /current/path/folder/too_much_folders/anotherpath/now_here
*/