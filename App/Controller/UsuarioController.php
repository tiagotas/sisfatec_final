<?php

namespace App\Controller;

use App\Model\UsuarioGrupoModel;
use App\Model\UsuarioModel;

class UsuarioController extends Controller
{

    public static function index()
    {
        $model = new UsuarioModel();
        $model->getAllRows();

        parent::render('usuario/listar_usuarios', $model);
    }

    public static function ver()
    {
        $model = new UsuarioModel();
        $model->getById((int) $_GET['id']);

        self::cadastrar($model);
    }



    public static function cadastrar(UsuarioModel $_model = null)
    {
        parent::isProtected();

        $model = ($_model == null) ? new UsuarioModel() : $_model;

        $model_grupos = new UsuarioGrupoModel();
        $model_grupos->getAllRows();
        $model->rows_grupo_usuario = $model_grupos->rows;

        parent::render('usuario/cadastrar_usuario', $model);
    }



    public static function meus_dados()
    {
        $model = new UsuarioModel();

        $model->meus_dados($_SESSION['dados_usuario']->id);

        parent::render('usuario/meus_dados', $model);
    }


    public static function salvar()
    {
        $model = new UsuarioModel();

        $model->id = isset($_POST['id']) ? $_POST['id'] : null;
        $model->id_grupo = $_POST['grupo'];
        $model->nome = $_POST['nome'];
        $model->email = $_POST['email'];
        $model->usuario = $_POST['usuario'];

        $model->salvar();

        header("Location: /usuario");

        /*else
            self::cadastrar($model);*/
    }


    public static function excluir()
    {
        $model = new UsuarioModel();
        $model->excluir((int) $_GET['id']);
        header("Location: /usuario");
    }

    public static function salvar_meus_dados()
    {
        $model = new UsuarioModel();

        $model->id = $_SESSION['dados_usuario']->id;
        $model->nome = $_POST['nome'];
        $model->usuario = $_POST['usuario'];
        $model->senha_confirmacao = $_POST['senha_confirmacao'];
        $model->nova_senha = $_POST['nova_senha'];
        $model->nova_senha_confirmacao = $_POST['nova_senha_confirmacao'];

        $model->salvar_meus_dados();

        parent::render('usuario/meus_dados', $model);
    }
}
