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
 * @package Lib\Calklib\getData
 *
 * @param object $conn  экземпляр подключения DBAL\DriverManager::getConnection(...)
 * @param string $table название таблицы
 *
 * @return array выбору всех всех полей из БД в виде ассоциативного массива
 */
function getData($conn, $table)
{
    return $conn->createQueryBuilder()
        ->select('*')
        ->from($table)
        ->execute()
        ->fetchAll();
}
