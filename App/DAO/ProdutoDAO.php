<?php

namespace App\DAO;

use \Exception;

class ProdutoDAO extends DAO
{
    /**
     * Faz as operações CRUD para a entidade Categoria
     */
    public function __construct()
    {
        parent::__construct();       
    }


    /**
     * Insere uma novo produto.
     */
    public function insert(array $dados_produto)
    {
        try {

            $sql = "INSERT INTO produto (id_categoria, descricao, preco) VALUES (?, ?, ?) ";

            $stmt = self::$conexao->prepare($sql);
            $stmt->bindValue(1, $dados_produto['id_categoria']);
            $stmt->bindValue(2, $dados_produto['descricao']);
            $stmt->bindValue(3, $dados_produto['preco']);

            return $stmt->execute();

        } catch(Exception $e) {
            throw new Exception("Erro ao inserir produto no banco de dados. ");    
        }
    }


    /**
     * 
     */
    public function update(array $dados_produto)
    {
        try {

            $sql = "UPDATE produto SET descricao = ?, preco = ? WHERE id = ? ";

            $stmt = self::$conexao->prepare($sql);
            $stmt->bindValue(1, $dados_produto['descricao']);
            $stmt->bindValue(2, $dados_produto['preco']);
            $stmt->bindValue(3, $dados_produto['id']);

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

            $sql = "DELETE FROM produto WHERE id = ?";

            $stmt = self::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject();

        } catch(Exception $e) {
            throw new Exception("Erro ao deletar o produto do banco de dados. ");    
        }        
    }


    /**
     * 
     */
    public function getById($id)
    {
        try {

            $sql = "SELECT * FROM produto WHERE id = ?";

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
    public function getAllRows()
    {
        try {

            $sql = "SELECT p.*,
                           DATE_FORMAT(p.data_cadastro, '%d/%m/%Y - %H:%i') AS data_cadastro, 
                           c.descricao AS descricao_categoria                   
                    
                    FROM produto p
                    JOIN categoria c ON (p.id_categoria = c.id)
                    ORDER BY id DESC";

            $stmt = self::$conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(DAO::FETCH_CLASS);

        } catch(Exception $e) {
            throw new Exception("Erro ao listar todos os produtos do banco de dados. ");    
        }        
    }
}