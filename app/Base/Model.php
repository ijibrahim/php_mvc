<?php

namespace App\Base;

use Exception;

class Model
{
    public function __construct()
    {
        $this->connect();
    }

    public function connect(): \PDO
    {
        try {
            $dbHost = env('DB_HOST');
            if (empty($dbHost)) 
            {
                throw new Exception('Please provide Database Host.');
            }

            $dbPort = env('DB_PORT');
            if (empty($dbPort)) 
            {
                throw new Exception('Please provide Database Port.');
            }

            $dbName = env('DB_NAME');
            if (empty($dbName)) 
            {
                throw new Exception('Please provide Database Name.');
            }
            
            $dbUser = env('DB_USER');
            if (empty($dbUser)) 
            {
                throw new Exception('Please provide Database User Name.');
            }

            $dbPassword = env('DB_PASSWORD');


            return new \PDO("mysql:host=$dbHost;dbname=$dbName; port=$dbPort", $dbUser, $dbPassword);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function execute(string $sqlQuery, array $bindParams = []): \PDOStatement|false
    {
        $pdo = $this->connect();
        $stmt = $pdo->prepare($sqlQuery);
        $stmt->execute($bindParams);
        return $stmt;
    }

    public function fetchAll(string $sqlQuery, array $bindParams = []): array|false
    {
        $stmt = $this->execute($sqlQuery, $bindParams);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function fetchObj(string $sqlQuery, array $bindParams = []): mixed
    {
        $stmt = $this->execute($sqlQuery, $bindParams);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
