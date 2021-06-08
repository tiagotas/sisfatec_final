<?php

namespace App\DAO;

use App\Model\UsuarioModel;
use \Exception;

final class UsuarioDAO extends DAO
{
    /**
     * Faz as operações CRUD para a entidade Categoria
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 
     */
    public function getAllRows()
    {
        try {

            $sql = "SELECT u.*,
                           DATE_FORMAT(u.data_cadastro, '%d/%m/%Y - %H:%i') AS data_cadastro, 
                           g.descricao AS grupo_usuario 
                    FROM usuario u
                    JOIN usuario_grupo g ON (g.id = u.id_grupo)
                    ORDER BY u.nome ASC ";

            $stmt = self::$conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(DAO::FETCH_CLASS);

        } catch(Exception $e) {
            throw new Exception("Erro ao pegar o produto do banco de dados. ");    
        }
    }


    /**
     * 
     */
    public function insert(UsuarioModel $model)
    {
        try {

            $sql = "INSERT INTO usuario (id_grupo, nome, usuario, email, senha) VALUES (?, ?, ?, ?, sha1(?) ) ";

            $stmt = self::$conexao->prepare($sql);
            $stmt->bindValue(1, $model->id_grupo);
            $stmt->bindValue(2, $model->nome);
            $stmt->bindValue(3, $model->usuario);
            $stmt->bindValue(4, $model->email);
            $stmt->bindValue(5, $model->senha);

            return $stmt->execute();

        } catch(Exception $e) {
            throw new Exception("Erro ao inserir dados do usuário no banco de dados: <br />" . $e->getMessage());    
        }

    }


    /**
     * 
     */
    public function delete(int $id)
    {
        try 
        {
            $stmt = self::$conexao->prepare("DELETE FROM usuario WHERE id = :id");
            return $stmt->execute(['id' => $id]);

        } catch(Exception $e) {
            throw new Exception("Erro ao pegar o produto do banco de dados. ");    
        }
    }


    /**
     * 
     */
    public function getById(int $id)
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


    /**
     * 
     */
    public function checkUserByCurrentPassword($current_password, int $id)
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


    /**
     * 
     */
    public function update(UsuarioModel $model)
    {
        try {

            $sql = "UPDATE usuario SET nome = ?, email= ? , id_grupo = ?, usuario = ? WHERE id = ? ";

            $stmt = self::$conexao->prepare($sql);
            $stmt->bindValue(1, $model->nome);
            $stmt->bindValue(2, $model->email);
            $stmt->bindValue(3, $model->id_grupo);
            $stmt->bindValue(4, $model->usuario);
            $stmt->bindValue(5, $model->id);

            return $stmt->execute();

        } catch(Exception $e) {
            throw new Exception("Erro ao atualizar dados do usuário no banco de dados: <br />" . $e->getMessage());    
        }
    }


    /**
     * 
     */
    public function updateCurrentUser(UsuarioModel $model)
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