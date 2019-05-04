<?php
declare(strict_types=1);

namespace Classes\Model;

use Classes\Db;
use Exception;
use RuntimeException;

/**
 * Class BonusRules
 *
 * @package Classes\Model
 */
class BonusRules
{
    private $table = 'bonus_rules';
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
     * @return array
     */
    public function getAll()
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
            ->select('*')
            ->from($this->table);
        $stmt = $queryBuilder->execute();
        return $stmt->fetchAll();
    }
}