<?php
session_start();

try 
{
    if (isset($_GET['salvar'])) 
    {
        include dirname(__FILE__) . '/../../DAO/CategoriaDAO.php';

        $categoria_dao = new CategoriaDAO();

        if(isset($_POST['id']))
        {
            $dados_formulario = array(
                'id' => $_POST['id'],
                'descricao' => $_POST['descricao'],
            );

            $categoria_dao->update($dados_formulario);

        } else {
            
            $dados_formulario = array(
                'descricao' => $_POST['descricao'],
            );

            $categoria_dao->insert($dados_formulario);            
        } 
        
        header("Location: listar_categoria.php");
    }

    if(isset($_GET['deletar']))
    {
        include_once dirname(__FILE__) . '/../../DAO/CategoriaDAO.php';

        $categoria_dao = new CategoriaDAO();

        $categoria_dao->delete( (int) $_GET['id']);

        header("Location: listar_categoria.php");
    }



    if(isset($_GET['id']))
    {
        include_once dirname(__FILE__) . '/../../DAO/CategoriaDAO.php';

        $categoria_dao = new CategoriaDAO();

        $dados_categoria_selecionada = $categoria_dao->getById( (int) $_GET['id']);

    } else {
        $dados_categoria_selecionada = new stdClass();
        $dados_categoria_selecionada->id = null;
        $dados_categoria_selecionada->descricao = null;
    }

} catch (Exception $e) {
    echo $e->getMessage();
}

?>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>CADASTRAR CATEGORIA</title>
</head>

<body>
    <div id="global">

    <?php include dirname(__FILE__) . '/../../includes/cabecalho.php' ?>

    
        <main>
            <h4>
                Cadastro de Categoria
            </h4>

            <form method="post" action="cadastrar_categoria.php?salvar=true">
                
                <label>Descrição (Nome) da categoria:
                    <input name="descricao" value="<?= $dados_categoria_selecionada->descricao ?>" />
                </label>

                <?php if($dados_categoria_selecionada->id !== null): ?>
                <input type="hidden" value="<?= $dados_categoria_selecionada->id ?>" name="id" />
                    
                    <a href="cadastrar_categoria.php?deletar=true&id=<?= $dados_categoria_selecionada->id ?>">
                    DELETAR
                    </a>

                <?php endif ?>

                <button type="submit">Salvar</button>
            </form>
        </main>

        <?php include dirname(__FILE__) .  '/../../includes/rodape.php' ?>

    </div>
</body>

</html>