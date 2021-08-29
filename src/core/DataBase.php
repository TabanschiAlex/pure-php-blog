<?php

namespace src\core;

use mysqli;
use Exception;

final class DataBase
{
    private static DataBase $instance;
    private mysqli $connection;

    private function __construct()
    {
        $config = require('../config/db.php');
        $this->connection = new mysqli(...$config);
    }

    private function __clone(): void
    {

    }

    /**
     * @throws Exception
     */
    public function __wakeup(): void
    {
        throw new Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): DataBase
    {
        if (!isset(self::$instance))
        {
            return self::$instance = new self();
        }

        return self::$instance;
    }

    public function connect(): mysqli
    {
        return $this->connection;
    }
}