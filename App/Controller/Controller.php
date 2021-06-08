<?php

namespace App\Controller;

use App\Model\Model;
use Exception;

abstract class Controller
{

    protected static function render($view, Model $model = null)
    {
        if($model !== null)
        {
            if( !($model instanceof Model) )
                throw new Exception("O conteúdo recebido não é um objeto Model");
        }


        $path = PATH_VIEW . 'modulos/' . $view . '.php';

        if(file_exists($path))
            include $path;
        else
            throw new Exception("A view $view não foi encontrada.");        
    }

    
    protected static function isProtected()
    {
        if(!isset($_SESSION['dados_usuario']))
            header("Location: /login");
    }

    protected static function isPost()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            return true;
        else
            return false;
    }

    protected static function isGet()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET')
            return true;
        else
            return false;
    }
}
