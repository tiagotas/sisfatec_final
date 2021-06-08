<?php

namespace App\Controller;

use App\DAO\LoginDAO;

use App\Model\LoginModel;

class LoginController extends Controller
{
    public static function index()
    {
        $model = new LoginModel();
        $model->usuario = isset($_COOKIE['sisfatec_user']) ? $_COOKIE['sisfatec_user'] :  '';

        parent::render('login/login', $model);
    }


    public static function esqueci_senha()
    {
        parent::render('login/esqueci_senha');
    }


    // Ajustar.
    public static function enviar_nova_senha()
    {
        $nova_senha = uniqid();
        $email = $_POST['email'];

        $retorno = "";

        $dao = new LoginDAO();

        $dao->setNewPasswordForUserByEmail($nova_senha, $email);

        $assunto = "Nova Senha do SisFatec";
        $mensagem = "Sua nova senha é: " . $nova_senha;

        $enviou = mail($email, $assunto, $mensagem, "From: teste.sendmail@metoda.com.br");

        if($enviou == true)
            $retorno = "uma nova senha está no email.";
        else
            $retorno = "Ocorreu um erro ao enviar o email pra tu";

        include PATH_VIEW . 'modulos/login/esquecia_senha.php';
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
        $model = new LoginModel();

        $model->usuario = $_POST['usuario'];
        $model->senha = $_POST['senha'];

        $dados_login = $model->auth();

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