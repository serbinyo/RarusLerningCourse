<?php

/*
Задача 58
Реализуйте функцию rrmdir, удаляющую директорию рекурсивно, то есть вместе со всем своим содержимым.

Подсказка Одна из возможных реализаций может использовать итераторы. Воспользуйтесь функцией scandir
вместо функции glob.
 */

function rrmdir($dir)
{
    if (is_dir($dir)) {
        $paths = scandir($dir, SCANDIR_SORT_NONE);

        foreach ($paths as $path) {
            if ($path != "." && $path != "..") {
                if (is_dir($dir . "/" . $path)) {
                    rrmdir($dir . "/" . $path);
                } else {
                    unlink($dir . "/" . $path);
                }
            }
        }
        rmdir($dir);
        return true;
    } else {
        throw new Exception('Каталог не найден');
    }
}

rrmdir('files/to_delete');