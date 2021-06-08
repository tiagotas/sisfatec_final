<?php

namespace App\Model;

use App\DAO\UsuarioGrupoDAO;
use Exception;

class UsuarioGrupoModel extends Model
{
    public $id;
    public $descricao;
    public $data_cadastro;


    /**
     * 
     */
    public function __construct()
    {
        self::$dao = new UsuarioGrupoDAO();
    }


    /**
     * 
     */
    public function getAllRows() : void
    {
        $this->rows = self::$dao->getAllRows();
        $this->rows_count = count($this->rows);
    }


    /**
     * 
     */
    public function getById(int $id)
    {
        $obj = self::$dao->getById($id);

        $this->id = $obj->id;
        $this->descricao = $obj->descricao;
        $this->data_cadastro = $obj->data_cadastro;
    }


    /**
     * 
     */
    public function save()
    {
        if($this->id == null)
        {
            self::$dao->insert($this);
            $this->success_message = "Grupo de Usuários Inserido com Sucesso!";

        } else {
            self::$dao->update($this);
            $this->success_message = "Grupo de Usuários Editado com Sucesso!";
        }
    }


    /**
     * 
     */
    public function delete(int $id)
    {
        try
        {
            $obj = self::$dao->delete($id);
        } catch(Exception $e) {
            $this->error_message = $e->getMessage();
        }        
    }
}