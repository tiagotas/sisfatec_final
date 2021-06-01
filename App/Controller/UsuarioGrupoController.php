<?php

namespace App\Controller;

use App\Model\UsuarioGrupoModel;

class UsuarioGrupoController extends Controller
{

    public static function index()
    {
        $model = new UsuarioGrupoModel();
        $model->getAllRows();

        parent::render('usuario_grupo/listar_grupos', $model);
    }

    public static function cadastrar($_model = null)
    {
        $model = ($_model == null) ? new UsuarioGrupoModel() : $_model;

        parent::render('usuario_grupo/cadastrar_grupo', $model);
    }


    public static function ver()
    {
        $model = new UsuarioGrupoModel();
        $model->getById( (int) $_GET['id']);

        self::cadastrar($model);
    }


    public static function salvar()
    {
        $model = new UsuarioGrupoModel();

        $model->id = isset($_POST['id']) ? $_POST['id'] : null;
        $model->descricao = $_POST['descricao'];

        $model->save();

        self::cadastrar($model);
    }

    public static function excluir()
    {
        $model = new UsuarioGrupoModel();

        $model->delete( (int) $_GET['id']);

        if(empty($model->error_message))
            header("Location: /usuario/grupo");
        else
            self::cadastrar($model);        
    }
}