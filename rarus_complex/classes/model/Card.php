<?php
declare(strict_types=1);

namespace Classes\Model;

use Classes\Db;
use Exception;
use RuntimeException;

/**
 * Class Card
 *
 * @package Classes\Model
 */
class Card
{
    private $table = 'card';
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = (new Db())->getConnect();
        } catch (Exception $e) {
            throw new RuntimeException('Ошибка подключения к БД: ' . $e, 404);
        }
    }

    /**
     * @param $needle
     *
     * @return string
     */
    private function needleRecognize($needle): string
    {
        if (!empty($needle)) {
            return \strlen($needle) === 11 ? 'phone_number' : 'num';
        }
        throw new RuntimeException('Missing parameter num: id or phone number', 404);
    }

    /**
     * @param $select_cond
     *
     * @return mixed[]
     */
    public function getAll($select_cond)
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
            ->select($select_cond)
            ->from($this->table);
        $stmt = $queryBuilder->execute();
        return $stmt->fetchAll();
    }

    /**
     * @param $select_cond
     * @param $from
     * @param $to
     *
     * @return mixed[]
     */
    public function getAllByDate($select_cond, $from, $to)
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
            ->select($select_cond)
            ->from($this->table)
            ->where('create_time BETWEEN ? and ?')
            ->setParameters([$from, $to]);
        $stmt = $queryBuilder->execute();
        return $stmt->fetchAll();
    }


    /**
     * @param $needle
     *
     * @return mixed
     */
    public function getOne($needle)
    {
        $col = $this->needleRecognize($needle);

        $queryBuilder = $this->conn->createQueryBuilder();

        $queryBuilder
            ->select('*')
            ->from($this->table)
            ->where($col . ' = ?')
            ->setParameter(0, $needle);

        $stmt = $queryBuilder->execute();
        return $stmt->fetch();
    }

    public function getSumOfBonuses()
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
            ->select('sum(bonus)')
            ->from($this->table);
        $stmt = $queryBuilder->execute();
        return $stmt->fetch();
    }

    /**
     * @param array $clientData массив клиентских данных,
     * первый элемент массива - номер новой карты
     *
     * @return int|bool Возвращает номер карты в случае
     * успеха и false в противном случае
     */
    public function create($clientData)
    {
        $queryBuilder = $this->conn->createQueryBuilder();

        $queryBuilder
            ->insert($this->table)
            ->values([
                'num' => '?',
                'last_name' => '?',
                'first_name' => '?',
                'middle_name' => '?',
                'birthday' => '?',
                'phone_number' => '?',
                'bonus' => '?',
                'discount' => '?',
                'turnover_amount' => '?',
                'status' => '?',
                'create_time' => '?',
                'update_time' => '?',
            ])
            ->setParameters($clientData);

        try {
            $queryBuilder->execute();
            return $clientData[0];
        } catch (Exception $e) {
            throw new RuntimeException('Ошибка ' . $e, 404);
        }
    }

    /**
     * @param $needle
     * @param $clientData
     *
     * @return string|bool
     */
    public function update($needle, $clientData)
    {
        $col = $this->needleRecognize($needle);

        $queryBuilder = $this->conn->createQueryBuilder();

        $queryBuilder
            ->update($this->table)
            ->set('num', '?')
            ->set('last_name', '?')
            ->set('first_name', '?')
            ->set('middle_name', '?')
            ->set('birthday', '?')
            ->set('phone_number', '?')
            ->set('bonus', '?')
            ->set('discount', '?')
            ->set('turnover_amount', '?')
            ->set('status', '?')
            ->set('update_time', '?')
            ->where($col . ' = ' . '?')
            ->setParameters($clientData)
            ->setParameter(11, $needle);

        try {
            $queryBuilder->execute();
            return $needle;
        } catch (Exception $e) {
            throw new RuntimeException('Ошибка ' . $e, 404);
        }
    }

    /**
     * @param $needle
     *
     * @return string|bool
     */
    public function delete($needle)
    {
        $col = $this->needleRecognize($needle);

        $queryBuilder = $this->conn->createQueryBuilder();

        $queryBuilder
            ->delete($this->table)
            ->where($col . ' = ' . $needle);

        try {
            $queryBuilder->execute();
            return $needle;
        } catch (Exception $e) {
            throw new RuntimeException('Ошибка ' . $e, 404);
        }
    }

    /**
     * @param $updatedColumn
     * @param $needle
     * @param $value
     *
     * @return string|bool
     */
    public function updateColumn($updatedColumn, $needle, $value)
    {
        $col = $this->needleRecognize($needle);

        $queryBuilder = $this->conn->createQueryBuilder();

        $queryBuilder
            ->update($this->table)
            ->set($updatedColumn, '?')
            ->where($col . ' = ' . '?')
            ->setParameter(0, $value)
            ->setParameter(1, $needle);

        try {
            $queryBuilder->execute();
            return $needle;
        } catch (Exception $e) {
            throw new RuntimeException('Ошибка ' . $e, 404);
        }
    }
}