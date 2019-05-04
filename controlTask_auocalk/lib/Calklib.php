<?php
/**
 * Библиотека Calklib
 *
 * @author       <serbinyo@gmail.com>
 *
 * Функции для использования в Конфигураторе цен Ford Focus
 */

namespace Lib\Calklib\getData;


/**
 * function getData
 *
 * Функция для получения ассоциативного массива всех данных
 * из таблиц БД
 *
 * @param object $conn  экземпляр подключения DBAL\DriverManager::getConnection(...)
 * @param string $table название таблицы
 *
 * @return array выбору всех всех полей из БД в виде ассоциативного массива
 * @package Lib\Calklib\getData
 *
 */
function getData($conn, $table)
{
    return $conn->createQueryBuilder()
        ->select('*')
        ->from($table)
        ->execute()
        ->fetchAll();
}

/**
 * function sectionBuilder
 *
 * Функция генерирует и печатает на экран
 * одну секцию для конфигуратора Ford focus
 *
 * @param object $conn  экземпляр подключения DBAL\DriverManager::getConnection(...)
 * @param string $table название таблицы
 *
 * @package Lib\Calklib\getData
 *
 */
function sectionWithRadioBuilder($data, $tableName, $logError)
{
//будем использовать счетчик для отметки первого элемента как checked
    $i = 0;
    foreach ($data as $row) {

        $checked = ($i === 0) ? 'checked' : '';

        /** Переменная $row_data:
         *
         * array Текущая стоимость наименование выбранного лакокрасочного покрытия
         */
        $row_data = $row['name'] . '?' . $row['cost'];

        echo '<div class="option">';

        echo '<label class="radio">';
        echo "<input type='radio' name='" . $tableName . "' value='"
            . $row_data . "' " . $checked . " >\n";
        echo "<div class='radio__text'>" . $row['name'] . '</div>';
        echo '</label>';

        //следующая строка для JS
        echo "<input type='hidden' id='" . $row['cost']
            . "' value='" . $row['img'] . "' >";

        echo "</div><br>\n";
        $i++;
    }

    if ($i !== 0) {
        echo '<input type="submit" class="submit-btn" name="' . $tableName . '" id="submit-' . $tableName . '" value="Далее">';
    } else {
        $logError->error('Ошибка. Нет данных', ['table' => $tableName]);
        echo '<p>Ошибка. Нет данных.</p>';
    }
}

function sectionWithCheckboxBuilder($data, $tableName, $logError)
{
    //будем использовать счетчик для отметки первого элемента как checked
    $i = 0;
    foreach ($data as $row) {

        echo '<div class="option">';

        echo "<label class='checkbox'>";
        //выводим опции
        echo "<input type='checkbox' name='" . $row['name'] . '?' . $row['cost'] . "' value='"
            . $row['id'] . "' >\n";
        echo "<div  class='checkbox__text'>" . $row['name'] . '</div>';
        echo '</label>';

        //следующая строка для JS
        //echo "<input type='hidden' name='dop' >\n";
        echo "<input type='hidden' value='" . $row['img'] . "' >\n";
        echo "<input type='hidden' value='" . $row['cost'] . "' >\n";

        echo "</div><br>\n";
        $i++;
    }

    //отправляем в результат цену на Дополнительные опции
    echo "<input type='hidden' name='" . $tableName . "-cost' value='' >\n";

    if ($i !== 0) {
        echo '<input type="submit" class="submit-btn" id="show-result" value="Показать результат">';
    } else {
        $logError->error('Ошибка. Нет данных', ['table' => $tableName]);
        echo '<p>Ошибка. Нет данных.</p>';
    }
}