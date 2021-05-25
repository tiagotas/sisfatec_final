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

    
    public function setNewPasswordForUserByEmail($nova_senha, $email)
    {
        try {

            $sql = "UPDATE usuario SET senha = sha1(?) WHERE email = ? ";

            $stmt = self::$conexao->prepare($sql);
            $stmt->bindValue(1, $nova_senha);
            $stmt->bindValue(2, $email);

            return $stmt->execute();

        } catch(\Exception $e) {
            throw new \Exception("Erro ao atualizar dados do usuário no banco de dados: <br />" . $e->getMessage());    
        }
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