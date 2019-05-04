<?php
declare(strict_types=1);

namespace Classes\Model;

use Classes\Db;
use Exception;
use RuntimeException;

/**
 * Class User
 *
 * @package Classes\Model
 */
class User
{
    private $table = 'auth_users';
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

    public function getOne($id, $select_cond)
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
            ->select($select_cond)
            ->from($this->table)
            ->where('id = ?')
            ->setParameter(0, $id);
        $stmt = $queryBuilder->execute();
        return $stmt->fetch();
    }

    public function getByLogin($login)
    {
        $queryBuilder = $this->conn->createQueryBuilder();

        $queryBuilder
            ->select('*')
            ->from($this->table)
            ->where('login = ?')
            ->setParameter(0, $login);

        $stmt = $queryBuilder->execute();
        return $stmt->fetch();
    }

    public function create($userData)
    {
        $queryBuilder = $this->conn->createQueryBuilder();

        $queryBuilder
            ->insert($this->table)
            ->values([
                'login' => '?',
                'last_name' => '?',
                'first_name' => '?',
                'middle_name' => '?',
                'birthday' => '?',
                'phone_number' => '?',
                'position' => '?',
                'passhash' => '?',
                'create_time' => '?',
                'update_time' => '?',
            ])
            ->setParameters($userData);

        try {
            $queryBuilder->execute();
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            throw new RuntimeException('Ошибка: ' . $e, 404);
        }
    }
}