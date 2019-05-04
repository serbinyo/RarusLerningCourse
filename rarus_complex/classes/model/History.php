<?php
declare(strict_types=1);


namespace Classes\Model;

use Classes\Authentication;
use Classes\Db;
use Exception;
use RuntimeException;

/**
 * Class History
 * Класс для работы с таблицей History
 *
 * @package Classes\Model
 */
class History
{
    private $table = 'history';
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
     * Создает новую запись в БД
     *
     * @param $operationData
     *
     * @return bool|string
     */
    private function create($operationData)
    {
        $queryBuilder = $this->conn->createQueryBuilder();

        $queryBuilder
            ->insert($this->table)
            ->values([
                'user_name' => '?',
                'user_id' => '?',
                'card_num' => '?',
                'operation_type' => '?',
                'operation_amount' => '?',
                'body' => '?',
                'created_time' => date('YmdHis'),
            ])
            ->setParameters($operationData);

        try {
            $queryBuilder->execute();
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            throw new RuntimeException('Ошибка записи в историю: ' . $e, 404);
        }
    }

    /**
     * Функция addToHistory подготавливает данные таблицы History
     * и вызывает функцию создания новой записи
     *
     * @param string     $operationType
     * @param string     $text
     * @param int        $card_num
     * @param float|null $amount
     */
    public function addToHistory(string $operationType, string $text, int $card_num = null, float $amount = null)
    {
        $historyData = [
            Authentication::$user['last_name'] . ' ' . Authentication::$user['first_name'],
            Authentication::$user['id'],
            $card_num,
            $operationType,
            $amount,
            $text,
        ];
        $this->create($historyData);
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
            ->where('created_time BETWEEN ? and ?')
            ->setParameters([$from, $to]);
        $stmt = $queryBuilder->execute();
        return $stmt->fetchAll();
    }

    /**
     * @param $select_cond
     *
     * @return mixed[]
     */
    public function getByCard($num, $select_cond)
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
            ->select($select_cond)
            ->from($this->table)
            ->where('card_num = ?')
            ->setParameter(0, $num);
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
    public function getByCardByDate($num, $select_cond, $from, $to)
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
            ->select($select_cond)
            ->from($this->table)
            ->where('card_num = ?')
            ->andWhere('created_time BETWEEN ? and ?')
            ->setParameters([$num, $from, $to]);
        $stmt = $queryBuilder->execute();
        return $stmt->fetchAll();
    }

    /**
     * @param $select_cond
     *
     * @return mixed[]
     */
    public function getTurnoverAll($select_cond)
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
            ->select($select_cond)
            ->from($this->table)
            ->where("operation_type='turnover'");
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
    public function getTurnoverAllByDate($select_cond, $from, $to)
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
            ->select($select_cond)
            ->from($this->table)
            ->where("operation_type='turnover'")
            ->andWhere('created_time BETWEEN ? and ?')
            ->setParameters([$from, $to]);
        $stmt = $queryBuilder->execute();
        return $stmt->fetchAll();
    }

    /**
     * @param $select_cond
     *
     * @return mixed[]
     */
    public function getTurnoverWithCards($select_cond)
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
            ->select($select_cond)
            ->from($this->table)
            ->where("operation_type='turnover'")
            ->andWhere('card_num is not null');
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
    public function getTurnoverWithCardsByDate($select_cond, $from, $to)
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
            ->select($select_cond)
            ->from($this->table)
            ->where("operation_type='turnover'")
            ->andWhere('card_num is not null')
            ->andWhere('created_time BETWEEN ? and ?')
            ->setParameters([$from, $to]);

        $stmt = $queryBuilder->execute();
        return $stmt->fetchAll();
    }

    /**
     * @param $num
     * @param $select_cond
     *
     * @return mixed[]
     */
    public function getTurnoverByCard($num, $select_cond)
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
            ->select($select_cond)
            ->from($this->table)
            ->where("operation_type='turnover'")
            ->andWhere('card_num = ?')
            ->setParameter(0, $num);

        $stmt = $queryBuilder->execute();
        return $stmt->fetchAll();
    }

    /**
     * @param $num
     * @param $select_cond
     * @param $from
     * @param $to
     *
     * @return mixed[]
     */
    public function getTurnoverByCardAndDate($num, $select_cond, $from, $to)
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
            ->select($select_cond)
            ->from($this->table)
            ->where("operation_type='turnover'")
            ->andWhere('card_num = ?')
            ->andWhere('created_time BETWEEN ? and ?')
            ->setParameters([$num, $from, $to]);

        $stmt = $queryBuilder->execute();
        return $stmt->fetchAll();
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function showBonusTurnover($key)
    {
        if ($key === 'credit') {
            $cond = '>';
        } else {
            $cond = '<';
        }

        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
            ->select('sum(operation_amount)')
            ->from($this->table)
            ->where("operation_type = 'bonus'")
            ->andWhere("operation_amount $cond 0");

        $stmt = $queryBuilder->execute();
        return $stmt->fetch();
    }

    /**
     * @param $key
     * @param $from
     * @param $to
     *
     * @return mixed[]
     */
    public function showBonusTurnoverByDate($key, $from, $to)
    {
        if ($key === 'credit') {
            $cond = '>';
        } else {
            $cond = '<';
        }

        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
            ->select('sum(operation_amount)')
            ->from($this->table)
            ->where("operation_type = 'bonus'")
            ->andWhere("operation_amount $cond 0")
            ->andWhere('created_time BETWEEN ? and ?')
            ->setParameters([$from, $to]);

        $stmt = $queryBuilder->execute();
        return $stmt->fetch();
    }
}