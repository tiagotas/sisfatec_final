<header class="container">

    <div class="row pt-3 pb-3 align-items-center">
        <div class="col-sm-9">
            <h1>SisFatec</h1>
        </div>
        <div class="col-sm-3">            
            

            <div class="btn-group">
                <a href="#" class="btn btn-primary">Bem-vindo (a) <?= $_SESSION['dados_usuario']->nome ?></a>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Meus Dados</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/login/logout">Sair</a>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded shadow">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#textoNavbar" aria-controls="textoNavbar" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="textoNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Produtos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <h6 class="dropdown-header">PRODUTOS</h6>
                        <a class="dropdown-item" href="/produto/cadastro">Novo Produto</a>
                        <a class="dropdown-item" href="/produto">Lista de Produtos</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">CATEGORIA DE PRODUTOS</h6>
                        <a class="dropdown-item" href="/produto/categoria/cadastrar">Nova Categoria de Produto</a>
                        <a class="dropdown-item" href="/produto/categoria">Lista de Categorias</a>
                    </div>
                </li>


            </ul>
        </div>
    </nav>

</header>