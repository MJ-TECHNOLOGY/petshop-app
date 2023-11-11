<?php

namespace App\Controller;

use App\Model\VendaProdutoModel;
use App\Controller\Controller;

class VendaProdutoController extends Controller
{
    public static function getList()
    {
        //parent::isAuthenticated();

        $model = new VendaProdutoModel();
        $data = $model->getAllRows();

        parent::setResponseAsJSON($data);
    }

    public static function index()
    {
        //parent::isAuthenticated();

        $model = new VendaProdutoModel();
        $model->getAllRows();
        $model->getAllCliente();
        $model->getAllProduto();

        include 'View/modules/Produto/VendaProduto.php';
    }

    public static function getById()
    {
        //parent::isAuthenticated();

        $model = new VendaProdutoModel();

        parent::setResponseAsJSON($model->getById($_GET['id']));
    }

    public static function save()
    {
        //parent::isAuthenticated();

        $venda_produto = new VendaProdutoModel();

        $venda_produto->id = $_POST['id'];
        $venda_produto->data_venda = $_POST['data_venda'];
        $venda_produto->quantidade = $_POST['quantidade'];
        $venda_produto->valor_total = $_POST['valor_total'];
        $venda_produto->id_produto = $_POST['id_produto'];
        $venda_produto->id_cliente = $_POST['id_cliente'];

        $venda_produto->save();

        header("Location: /venda_produto");
    }

    public static function delete()
    {
        //parent::isAuthenticated();

        $model = new VendaProdutoModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}