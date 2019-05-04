<?php
declare(strict_types=1);

namespace Classes;

use \Doctrine\DBAL;
use RuntimeException;

class Db
{
    private $connection;

    private $connectionParams = [
        'dbname' => 'yabs_v0.3',
        'user' => 'stud06',
        'password' => 'stud06',
        'host' => '127.0.0.1',
        'driver' => 'pdo_mysql',
    ];

    public function __construct()
    {
        try {
            $this->connection = DBAL\DriverManager::getConnection($this->connectionParams, new DBAL\Configuration());
            $this->connection->query('set names UTF8');
        } catch (DBAL\DBALException $e) {
            throw new RuntimeException('No connection with database. Check params', 404);
        }

    }

    /**
     * @return DBAL\Connection
     */
    public function getConnect()
    {
        return $this->connection;
    }
}