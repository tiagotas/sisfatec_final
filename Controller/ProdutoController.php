<?php

class ProdutoController extends Controller
{
    public static function index()
    {
        parent::isProtected();

        $dao = new ProdutoDAO();

        $lista_produtos = $dao->getAllRows();

        include PATH_VIEW . '/modulos/produto/listar_produtos.php';
    }

    public static function cadastro()
    {
        parent::isProtected();

        $dao_categoria = new CategoriaDAO();
        $lista_categorias = $dao_categoria->getAllRows();

        $dados_produto = new stdClass();
        $dados_produto->id = null;
        $dados_produto->descricao = null;
        $dados_produto->preco = null;
        $dados_produto->id_categoria = null;

        include PATH_VIEW . '/modulos/produto/cadastrar_produto.php';
    }

    public static function ver()
    {
        parent::isProtected();

        $dao_categoria = new CategoriaDAO();
        $lista_categorias = $dao_categoria->getAllRows();

        if (isset($_GET['id'])) {

            $dao = new ProdutoDAO();

            $id_produto = (int) $_GET['id'];

            $dados_produto = $dao->getById($id_produto);
        } else {

            $dados_produto = new stdClass();
            $dados_produto->id = null;
            $dados_produto->descricao = null;
            $dados_produto->preco = null;
            $dados_produto->id_categoria = null;
        }

        include PATH_VIEW . '/modulos/produto/cadastrar_produto.php';
    }

    public static function salvar()
    {
        parent::isProtected();

        $dao = new ProdutoDAO();

        $dados_produto = array(
            'descricao' => $_POST['descricao'],
            'id_categoria' => $_POST['id_categoria'],
            'preco' => $_POST['preco']
        );

        if (isset($_POST['id'])) {
            $dados_produto['id'] = $_POST['id'];

            $dao->update($dados_produto);
        } else {
            $dao->insert($dados_produto);
        }

        header("Location: /produto");
    }

    public static function excluir()
    {
        parent::isProtected();
        
        $dao = new ProdutoDAO();

        $id_produto = (int) $_GET['id'];

        $dao->delete($id_produto);

        header("Location: /produto");

    }
}
