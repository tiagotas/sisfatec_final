<?php

class LoginController extends Controller
{
    public static function index()
    {
        include PATH_VIEW . '/login.php';
    }

    public static function auth()
    {
        $dao = new LoginDAO();

        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $dados_login = $dao->auth($usuario, $senha);

        if(is_object($dados_login))
        {
            $_SESSION['dados_usuario'] = $dados_login;
            header("Location: /");
        } else 
            header("Location /login?fail=true");
    }

    public static function logout()
    {
        session_destroy();

        header("Location: /login");
    }
}