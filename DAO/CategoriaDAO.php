<?php

class CategoriaDAO
{
    private $conexao;

    /**
     * Faz as operações CRUD para a entidade Categoria
     */
    public function __construct()
    {
        $this->conexao = new MySQL();
    }


    /**
     * Insere uma nova categoria de produto.
     */
    public function insert(array $dados_categoria)
    {
        try {

            $sql = "INSERT INTO categoria (descricao) VALUES (?) ";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $dados_categoria['descricao']);

            return $stmt->execute();

        } catch(Exception $e) {
            throw new Exception("Erro ao inserir categoria no banco de dados. ");    
        }
    }


    /**
     * 
     */
    public function update($dados_categoria)
    {
        try {

            $sql = "UPDATE categoria SET descricao = ? WHERE id = ? ";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $dados_categoria['descricao']);
            $stmt->bindValue(2, $dados_categoria['id']);

            return $stmt->execute();

        } catch(Exception $e) {
            throw new Exception("Erro ao inserir categoria no banco de dados. ");    
        }
        
    }


    /**
     * 
     */
    public function delete($id)
    {
        try {

            $sql = "DELETE FROM categoria WHERE id = ?";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject();

        } catch(Exception $e) {
            throw new Exception("Erro ao deletar a categoria do banco de dados. ");    
        }        
    }


    /**
     * 
     */
    public function getById($id)
    {
        try {

            $sql = "SELECT * FROM categoria WHERE id = ?";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject();

        } catch(Exception $e) {
            throw new Exception("Erro ao pegar a categoria do banco de dados. ");    
        }        
    }


    /**
     * 
     */
    public function getAllRows()
    {
        try {

            $sql = "SELECT * FROM categoria ORDER BY id DESC";

            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch(Exception $e) {
            throw new Exception("Erro ao listar todas as categoria do banco de dados. ");    
        }        
    }
}