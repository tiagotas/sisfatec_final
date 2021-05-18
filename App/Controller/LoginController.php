<?php

namespace App\Controller;

use App\DAO\LoginDAO;

class LoginController extends Controller
{
    public static function index()
    {
        $usuario = isset($_COOKIE['sisfatec_user']) ? $_COOKIE['sisfatec_user'] :  '';

        include PATH_VIEW . '/login.php';
    }


    private static function remember($usuario)
    {
        $validade = strtotime("+1 month");

        setcookie("sisfatec_user", $usuario, $validade, "/", "", false, true);
    }

    private static function forget()
    {
        if(isset($_COOKIE['sisfatec_user']))
        {
            $validade = time() - 3600;
            setcookie("sisfatec_user", "", $validade, "/", "", false, true);
        }        
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

            if(isset($_POST['lembrar']))
                self::remember($_POST['usuario']);          

            header("Location: /");
        } else 
            header("Location /login?fail=true");
    }

    public static function logout()
    {
        session_destroy();

        self::forget();

        header("Location: /login");
    }
}