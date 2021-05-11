<?php

class MySQL extends PDO
{
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "@MySQL_dev_2020";
    private $db = "fatec_web3_2021";

    private $ops = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    public function __construct()
    {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db;

        return parent::__construct($dsn, $this->usuario, $this->senha, $this->ops);        
    }
}
