<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SisFatec - Lista de Produto</title>

    <?php include PATH_VIEW . '/includes/config_css.php' ?>
</head>

<body class="bg-light">

    <?php include PATH_VIEW . '/includes/cabecalho.php' ?>

    <main class="container pt-3 pb-3 mt-3 bg-white border rounded">
        <h2>Lista de Produtos</h2>
        <table class="table table-sm table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Ações</th>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Data de Cadastro</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($lista_produtos as $item) : ?>
                    <tr>
                        <td> <a href="/produto/ver?id=<?= $item->id ?>">Abrir</a> </td>
                        <td><?= $item->id ?></td>
                        <td><?= $item->descricao ?></td>
                        <td><?= $item->descricao_categoria ?></td>
                        <td>R$ <?= number_format($item->preco, 2, ",", ".") ?></td>
                        <td><?= $item->data_cadastro ?></td>
                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>

    </main>

    <?php include PATH_VIEW . '/includes/rodape.php' ?>

    <?php include PATH_VIEW . '/includes/config_js.php' ?>
</body>

</html>