<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SisFatec - Cadastro de Produto</title>

    <?php include PATH_VIEW . '/includes/config_css.php' ?>

</head>

<body class="bg-light">

    <?php include PATH_VIEW . '/includes/cabecalho.php' ?>

    <main class="container pt-3 pb-3 mt-3 bg-white border rounded">
        <h2>Cadastro de Produtos</h2>

        <form action="/produto/salvar" method="post">

            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label for="descricao">Descrição: </label>
                    <input type="text" name="descricao" id="descricao" autofocus class="form-control" value="<?= $dados_produto->descricao ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="id_categoria">Categoria: </label>
                    <select name="id_categoria" id="id_categoria" class="form-control">
                        <option value="">Selecione a Categoria</option>
                        <?php
                        foreach ($lista_categorias as $item) :
                            $selected = ($dados_produto->id_categoria == $item->id) ? 'selected' : '';
                        ?>
                            <option value="<?= $item->id ?>" <?= $selected ?>> <?= $item->descricao ?> </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="preco">Preço </label>
                    <input type="number" name="preco" id="preco" class="form-control" value="<?= $dados_produto->preco ?>" />
                </div>
            </div>
            <div class="form-row justify-content-center p-3">
                <?php if ($dados_produto->id !== null) : ?>
                    <input type="hidden" name="id" value="<?= $dados_produto->id ?>" />
                    <a id="btn_excluir" class="btn btn-danger" href="/produto/excluir?id=<?= $dados_produto->id ?> ">
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