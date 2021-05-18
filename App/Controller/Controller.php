<?php

namespace App\Controller;

abstract class Controller
{
    protected static function isProtected()
    {
        if(!isset($_SESSION['dados_usuario']))
            header("Location: /login");
    }
}
