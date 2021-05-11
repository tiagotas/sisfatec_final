<?php

class Autoload
{

    public function __construct()
    {
        spl_autoload_register(function($class)
        {
            $arquivo_controller = PATH_CONTROLLER . '/' . $class . '.php';

            if(file_exists($arquivo_controller))
            {
                include $arquivo_controller;
                
            } else
                include PATH_DAO . '/' . $class . ".php";
        });             
    }
}

new Autoload();