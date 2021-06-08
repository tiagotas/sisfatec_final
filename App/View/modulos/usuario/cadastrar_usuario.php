<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SisFatec - Cadastro de Usuário</title>

    <?php include PATH_VIEW . '/includes/config_css.php' ?>

</head>

<body class="bg-light">

    <?php include PATH_VIEW . '/includes/cabecalho.php' ?>

    <main class="container pt-3 pb-3 mt-3 bg-white border rounded">
        <h2>Cadastro de Usuários</h2>

        <form action="/usuario/salvar" method="post">

            
            <?php if(!empty($model->success_message)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Deu Certo!</strong> <?= $model->success_message ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif ?>

            <?php if(!empty($model->error_message)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ops!</strong> <?= $model->error_message ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif ?>


            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome" id="nome" autofocus class="form-control" value="<?= $model->nome ?>" />
                </div>
                <div class="form-group col-sm-6">
                    <label for="grupo">Grupo: </label>
                    <select id="grupo" name="grupo" class="form-control">
                        <option value="">Selecione</option>
                        <?php foreach($model->rows_grupo_usuario as $item): ?>
                        <option value="<?= $item->id ?>" <?= $model->id_grupo == $item->id ? 'selected' : '' ?> >  <?= $item->descricao ?></option>
                        <?php endforeach ?>
                    </select>                   
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="usuario">Usuario: </label>
                    <input type="text" name="usuario" id="usuario" class="form-control" value="<?= $model->usuario ?>" />
                </div>
                <div class="form-group col-sm-6">
                    <label for="email">E-mail: </label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= $model->email ?>" />                 
                </div>
            </div>

            <div class="form-row justify-content-center p-3">
                <?php if ($model->id !== null) : ?>
                    <input type="hidden" name="id" value="<?= $model->id ?>" />
                    <a class="btn btn-secondary" href="/usuario">
                        Cancelar
                    </a>

                    <a id="btn_excluir" class="btn btn-danger ml-3" href="/usuario/excluir?id=<?= $model->id ?> ">
                        Excluir
                    </a>
                <?php endif ?>
                <button type="submit" class="btn btn-success ml-3">
                    Salvar
                </button>
            </div>
        </form>
    </main>

    <?php include PATH_VIEW . '/includes/rodape.php' ?>

    <?php include PATH_VIEW . '/includes/config_js.php' ?>
    <script type="text/javascript" src="/View/js/comportamentos_produto.js"></script>

</body>

</html>