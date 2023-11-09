<?php

namespace App\Controller;

use App\Model\ProdutoModel;
use App\Controller\Controller;

class ProdutoController extends Controller
{
    public static function getList()
    {
        $model = new ProdutoModel();
        $data = $model->getAllRows();

        parent::setResponseAsJSON($data);
    }

    public static function index()
    {
        $model = new ProdutoModel();
        $model->getAllRows();
        $model->getAllCategoria();

        include 'View/modules/Produto/ListarProduto.php';
    }

    public static function getById()
    {
        $model = new ProdutoModel();

        parent::setResponseAsJSON($model->getById($_GET['id']));
    }

    public static function save()
    {
        $categoria = new ProdutoModel();

        $categoria->id = $_POST['id'];
        $categoria->descricao = $_POST['descricao'];
        $categoria->marca = $_POST['marca'];
        $categoria->preco = $_POST['preco'];
        $categoria->peso = $_POST['peso'];
        $categoria->codigo = $_POST['codigo'];
        $categoria->data_validade = $_POST['data_validade'];
        $categoria->id_categoria = $_POST['id_categoria'];

        $categoria->save();

        header("Location: /produto");
    }

    public static function delete()
    {
        $model = new ProdutoModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}