<?php

class Autoload
{
    public function __construct()
    {
        spl_autoload_register(function($class)
        {            
            $path = str_replace("\\", "/", $class) . ".php";

            if(file_exists($path))
                include $path;
            else
                throw new Exception("Classe não encontrada: " . $class . "<br />");
        });             
    }
}

new Autoload();