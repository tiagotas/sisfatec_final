<?php

namespace App\Model;

use App\DAO\UsuarioDAO;
use Exception;

class UsuarioModel extends Model
{
    public $id;
    public $nome;
    public $usuario;
    public $senha;
    public $data_cadastro;


    public $senha_confirmacao;

    public $nova_senha;
    public $nova_senha_confirmacao;


    public $confirmacao = null;

    public $erro = null;


    public function __construct()
    {
        self::$dao = new UsuarioDAO();
    }


    public function meus_dados($id)
    {
        $dados = self::$dao->getById($id);

        $this->id = $dados->id;
        $this->nome = $dados->nome;
        $this->usuario = $dados->usuario;
    }


    public function salvar()
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

                self::$dao->update($this);
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


