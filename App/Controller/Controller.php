<?php

namespace App\Controller;

use Exception;

abstract class Controller
{

    protected static function render($view, $model = null)
    {
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
}
