<?php
session_start();

$rota = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

require "config.php";

require "Autoload.php";

require "rotas.php";