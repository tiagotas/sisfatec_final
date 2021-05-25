<?php

namespace App\DAO;

use App\Model\UsuarioModel;
use \Exception;

class UsuarioDAO extends DAO
{
    /**
     * Faz as operações CRUD para a entidade Categoria
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getById($id)
    {
        try {

            $sql = "SELECT * FROM usuario WHERE id = ?";

            $stmt = self::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject();

        } catch(Exception $e) {
            throw new Exception("Erro ao pegar o produto do banco de dados. ");    
        }
    }


    public function checkUserByCurrentPassword($current_password, $id)
    {
        try {

            $sql = "SELECT id FROM usuario WHERE id = ? AND senha = sha1(?) ";

            $stmt = self::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->bindValue(2, $current_password);
            $stmt->execute();

            return $stmt->rowCount();

        } catch(Exception $e) {
            throw new Exception("Erro ao pegar o produto do banco de dados. ");    
        }
    }


    public function update(UsuarioModel $model)
    {
        try {

            $sql = "UPDATE usuario SET nome = ?, usuario = ?, senha = sha1(?) WHERE id = ? ";

            $stmt = self::$conexao->prepare($sql);
            $stmt->bindValue(1, $model->nome);
            $stmt->bindValue(2, $model->usuario);
            $stmt->bindValue(3, $model->senha);
            $stmt->bindValue(4, $model->id);

            return $stmt->execute();

        } catch(Exception $e) {
            throw new Exception("Erro ao atualizar dados do usuário no banco de dados: <br />" . $e->getMessage());    
        }
    }
}