<?php

use App\Controller\{LoginController, 
                    DashboardController, 
                    ProdutoController, 
                    UsuarioController,
                    UsuarioGrupoController};

try 
{
    switch ($rota) 
    {
        case '/login':
            LoginController::index();
            break;

        case '/login/esqueci-senha':
            LoginController::esqueci_senha();
            break;
            
        case '/login/esqueci-senha/send':
            LoginController::enviar_nova_senha();
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


        /**
         * Rotas para trabalhar com produtos. 
         */ 
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


        /**
         * Rotas Para trabalhar com usuário.
         */    
        case '/usuario':
            UsuarioController::index();
            break;

        case '/usuario/cadastrar':
            UsuarioController::cadastrar();
            break;
        
        case '/usuario/ver':
            UsuarioController::ver();
            break;

        case '/usuario/salvar':
            UsuarioController::salvar();
            break;

        case '/usuario/excluir':
            UsuarioController::excluir();
            break;
        
        case '/usuario/meus-dados':
            UsuarioController::meus_dados();
            break;

        case '/usuario/meus-dados/salvar':
            UsuarioController::salvar_meus_dados();
            break; 
        
        /**
         * Rotas para trabalhar com grupos de usuários.
         */
        case '/usuario/grupo':
            UsuarioGrupoController::index();
            break;

        case '/usuario/grupo/cadastrar':
            UsuarioGrupoController::cadastrar();
            break;
        
        case '/usuario/grupo/ver':
            UsuarioGrupoController::ver();
            break;
        
        case '/usuario/grupo/salvar':
            UsuarioGrupoController::salvar();
            break;
        
        case '/usuario/grupo/excluir':
            UsuarioGrupoController::excluir();
            break;


            
        default:
            echo "Erro 404 - Rota não existe.";
            break;
    }
    
} catch (Exception $e) {
    echo $e->getMessage();
}