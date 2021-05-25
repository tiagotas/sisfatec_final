<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SisFatec - Meus Dados</title>

    <?php include PATH_VIEW . '/includes/config_css.php' ?>

</head>

<body class="bg-light">

    <?php include PATH_VIEW . '/includes/cabecalho.php' ?>

    <main class="container pt-3 pb-3 mt-3 bg-white border rounded">
        <h2>Meus Dados</h2>

        <form action="/usuario/meus-dados/salvar" method="post">

            <?php if ($model->confirmacao !== null) : ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Sucesso!</h4>
                    <hr>
                    <p class="mb-0"><?= $model->confirmacao ?></p>
                </div>
            <?php endif ?>


            <?php if ($model->erro !== null) : ?>
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Ocorreu um erro!</h4>
                    <hr>
                    <p class="mb-0"><?= $model->erro ?></p>
                </div>
            <?php endif ?>




            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome" id="nome" autofocus class="form-control" value="<?= $model->nome ?>" />
                </div>
                <div class="form-group col-sm-6">
                    <label for="nome">Usuário: </label>
                    <input type="text" name="usuario" id="usuario" class="form-control" value="<?= $model->usuario ?>" />
                </div>
            </div>

            <fieldset class="bg-light border rounded p-3">
                <legend class="h6 text-center bg-light w-auto p-1 border rounded">
                    ALTERAR SENHA:
                </legend>

                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="nova_senha">Nova Senha: </label>
                        <input type="password" name="nova_senha" id="nova_senha" class="form-control" />
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="nova_senha_confirmacao">Confirme a Nova Senha: </label>
                        <input type="password" name="nova_senha_confirmacao" id="nova_senha_confirmacao" class="form-control" />
                    </div>
                </div>

            </fieldset>

            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label for="senha_confirmacao">Confirme sua Senha: </label>
                    <input type="password" name="senha_confirmacao" id="senha_confirmacao" class="form-control" />
                </div>
            </div>


            <div class="form-row justify-content-center p-3">
                <button type="submit" class="btn btn-success ml-3">
                    Salvar
                </button>
            </div>



        </form>
    </main>

    <?php include PATH_VIEW . '/includes/rodape.php' ?>

    <?php include PATH_VIEW . '/includes/config_js.php' ?>

</body>

</html>