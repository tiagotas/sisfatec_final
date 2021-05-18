<?php

namespace App\DAO;

class LoginDAO extends DAO
{
    /**
     * Faz as operações de Login
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Recebe um usuário e senha e faz uma consulta no db.
     */
    public function auth($usuario, $senha)
    {
        $sql = "SELECT id, nome, DATE_FORMAT(data_cadastro, '%d/%m/%Y - %H:%i') AS data_cad 
                FROM usuario
                WHERE usuario = ? AND senha = ? ";

        $stmt = self::$conexao->prepare($sql);
        $stmt->bindValue(1, $usuario);
        $stmt->bindValue(2, sha1($senha));
        $stmt->execute();

        return $stmt->fetchObject();
    }
}