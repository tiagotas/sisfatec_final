<?php

namespace App\Controller;

use App\Model\UsuarioModel;

class UsuarioController extends Controller
{

    public static function meus_dados()
    {
        $model = new UsuarioModel();

        $model->meus_dados($_SESSION['dados_usuario']->id);

        parent::render('usuario/meus_dados', $model);
    }



    public static function salvar()
    {
        $model = new UsuarioModel();

        $model->id = $_SESSION['dados_usuario']->id;
        $model->nome = $_POST['nome'];
        $model->usuario = $_POST['usuario'];        
        $model->senha_confirmacao = $_POST['senha_confirmacao'];
        $model->nova_senha = $_POST['nova_senha'];
        $model->nova_senha_confirmacao = $_POST['nova_senha_confirmacao'];

        $model->salvar();

        parent::render('usuario/meus_dados', $model);
    }
}