<?php

namespace App\Model;

use App\DAO\UsuarioDAO;
use Exception;

final class UsuarioModel extends Model
{
    public $id;
    public $id_grupo;
    public $nome;
    public $usuario;
    public $email;
    public $senha;
    public $data_cadastro;
    public $grupo_usuario;

    public $rows_grupo_usuario;


    public $senha_confirmacao;

    public $nova_senha;
    public $nova_senha_confirmacao;


    public $confirmacao = null;

    public $erro = null;


    /**
     * 
     */
    public function __construct()
    {
        self::$dao = new UsuarioDAO();
    }


    /**
     * 
     */
    public function getAllRows()
    {
        $this->rows = self::$dao->getAllRows();
        $this->rows_count = count($this->rows);
    }


    /**
     * 
     */
    public function getById(int $id)
    {
        $dados = self::$dao->getById($id);

        $this->id = $dados->id;
        $this->nome = $dados->nome;
        $this->usuario = $dados->usuario;
        $this->email = $dados->email;
        $this->data_cadastro = $dados->data_cadastro;
        $this->id_grupo = $dados->id_grupo;
    }

    /**
     * 
     */
    public function salvar()
    {
        try
        {
            if($this->id == null)
            {
                $this->senha = uniqid();
                
                return self::$dao->insert($this);                
            }                              
            else
                return self::$dao->update($this);

        } catch(Exception $e) {
            $this->error_message = $e->getMessage();
            exit($this->error_message);
        }
        
    }


    /**
     * 
     */
    public function excluir()
    {
        try
        {
            if(self::$dao->delete( (int) $_GET['id'] ))
                return true;
            else
                throw new Exception("Não foi possível excluir o usuário.");

        } catch(Exception $e) {
            $this->erro = $e->getMessage();
            exit($this->error_message);
        }      
    }



    /**
     * 
     */
    public function meus_dados($id)
    {
        $dados = self::$dao->getById($id);

        $this->id = $dados->id;
        $this->nome = $dados->nome;
        $this->usuario = $dados->usuario;
    }


    /**
     * 
     */
    public function salvar_meus_dados()
    {
        try
        {
            if($this->checkPassword())
            {
                if(!empty($this->nova_senha))
                {
                    if($this->checkNewPassword())
                        $this->senha = $this->nova_senha;
                    else
                        throw new Exception("A confirmação da nova senha não confere.");
                } else
                    $this->senha = $this->senha_confirmacao;                

                self::$dao->updateCurrentUser($this);
                $this->confirmacao = "Dados Alterados com Sucesso";

            } else
                throw new Exception("A confirmação da senha atual não confere.");

        } catch (Exception $e) {
            $this->erro = $e->getMessage();
        }    
    }


    /**
     * Verifica se a senha digitada confere com a senha do usuário no Bancod e Dados.
     */
    private function checkPassword()
    {
        $retorno = self::$dao->checkUserByCurrentPassword($this->senha_confirmacao, $this->id);

        return $retorno > 0 ? true : false;
    }


    /**
     * Verifica se o usuário deseja atualizar a senha e se a confirmação da nova senha
     * confere com a nova senha digitada.
     */
    private function checkNewPassword()
    {        
        return ($this->nova_senha == $this->nova_senha_confirmacao) ? true : false;
    }
}


