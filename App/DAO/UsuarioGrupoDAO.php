<?php

namespace App\DAO;

use App\Model\UsuarioGrupoModel;
use \Exception;

class UsuarioGrupoDAO extends DAO
{
    /**
     * Faz as operações CRUD para a entidade Categoria
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(UsuarioGrupoModel $model)
    {
        try {

            $sql = "INSERT INTO usuario_grupo (descricao) VALUES (?) ";

            $stmt = self::$conexao->prepare($sql);
            $stmt->bindValue(1, $model->descricao);

            return $stmt->execute();

        } catch(Exception $e) {
            throw new Exception("Erro ao inserir grupo de usuário no banco de dados. ");    
        }
    }


    public function getAllRows()
    {
        try {

            $sql = "SELECT g.*,
                           DATE_FORMAT(g.data_cadastro, '%d/%m/%Y - %H:%i') AS data_cadastro                
                    FROM usuario_grupo g
                    ORDER BY g.descricao ASC";

            $stmt = self::$conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(DAO::FETCH_CLASS);

        } catch(Exception $e) {
            throw new Exception("Erro ao listar todos os produtos do banco de dados. ");    
        }        
    }

    public function getById(int $id)
    {
        try {

            $sql = "SELECT * FROM usuario_grupo WHERE id = ?";

            $stmt = self::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject();

        } catch(Exception $e) {
            throw new Exception("Erro ao pegar o grupo do banco de dados. ");    
        }
    }


    public function update(UsuarioGrupoModel $model)
    {
        try {

            $sql = "UPDATE usuario_grupo SET descricao = ? WHERE id = ? ";

            $stmt = self::$conexao->prepare($sql);
            $stmt->bindValue(1, $model->descricao);
            $stmt->bindValue(2, $model->id);

            return $stmt->execute();

        } catch(Exception $e) {
            throw new Exception("Erro ao atualizar dados do grupo de usuário no banco de dados: <br />" . $e->getMessage());    
        }
    }

    public function delete(int $id)
    {
        try {

            $sql = "DELETE FROM usuario_grupo WHERE id = ? ";

            $stmt = self::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);

            return $stmt->execute();

        } catch(Exception $e) {
            throw new Exception("Erro ao excluir o grupo de usuário no banco de dados: <br />" . $e->getMessage());    
        }
    }
}