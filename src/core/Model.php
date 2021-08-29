<?php

namespace src\core;

use mysqli;

abstract class Model
{
    protected mysqli $db;

    public function __construct()
    {
        $this->db = DataBase::getInstance()->connect();
    }
}