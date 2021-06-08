<?php

namespace App\Model;

use App\DAO\LoginDAO;
use Exception;

class LoginModel extends Model
{
    public $usuario;
    public $senha;

    public function __construct()
    {
        self::$dao = new LoginDAO();
    }

    public function auth()
    {
        $dados_login = self::$dao->auth($this->usuario, $this->senha);

        return $dados_login;
    }
}