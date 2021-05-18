<?php

namespace App\DAO;

use Biblioteca\MySQL;

abstract class DAO extends MySQL
{
    protected static $conexao = null;

    public function __construct()
    {
        if(self::$conexao == null)
            self::$conexao = parent::__construct();
    }
}