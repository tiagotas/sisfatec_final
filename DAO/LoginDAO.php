<?php

class LoginDAO
{
    private $conexao;

    /**
     * Faz as operações de Login
     */
    public function __construct()
    {
        $this->conexao = new MySQL();
    }


    /**
     * Recebe um usuário e senha e faz uma consulta no db.
     */
    public function auth($usuario, $senha)
    {
        $sql = "SELECT id, nome, DATE_FORMAT(data_cadastro, '%d/%m/%Y - %H:%i') AS data_cad 
                FROM usuario
                WHERE usuario = ? AND senha = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $usuario);
        $stmt->bindValue(2, sha1($senha));
        $stmt->execute();

        return $stmt->fetchObject();
    }
}