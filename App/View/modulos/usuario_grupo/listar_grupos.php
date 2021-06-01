<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SisFatec - Lista de Grupo de Usuários</title>

    <?php include PATH_VIEW . '/includes/config_css.php' ?>
</head>

<body class="bg-light">

    <?php include PATH_VIEW . '/includes/cabecalho.php' ?>

    <main class="container pt-3 pb-3 mt-3 bg-white border rounded">
        <h2>Lista de Grupos de Usuários</h2>
        <table class="table table-sm table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Descrição</th>
                    <th>Data de Cadastro</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($model->rows as $item) : ?>
                    <tr>
                        <td><a href="/usuario/grupo/ver?id=<?= $item->id ?>"><?= $item->descricao ?></a></td>
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