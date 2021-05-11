<?php

try {

    switch ($rota) 
    {
        case '/login':
            LoginController::index();
            break;

        case '/login/auth':
            LoginController::auth();
            break;

        case '/login/logout':
                LoginController::logout();
            break;
        
        case "/":
            DashboardController::index();
            break;

        case '/produto/cadastro':
            ProdutoController::cadastro();
            break;

        case '/produto/ver':
            ProdutoController::ver();
            break;

        case '/produto/salvar':
            ProdutoController::salvar();
            break;

        case '/produto/excluir':
            ProdutoController::excluir();
            break;

        case '/produto':
            ProdutoController::index();
            break;

        default:
            echo "Erro 404 - Rota não existe.";
            break;
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
