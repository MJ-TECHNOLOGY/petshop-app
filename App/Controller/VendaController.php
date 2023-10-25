<?php

namespace App\Controller;

use App\Model\VendaModel;
use App\Controller\Controller;

class VendaController extends Controller
{
    public static function getList()
    {
        $model = new VendaModel();
        $data = $model->getAllRows();

        parent::setResponseAsJSON($data);
    }

    public static function index()
    {
        $model = new VendaModel();
        $model->getAllRows();
        $model->getAllCliente();
        $model->getAllAnimal();

        include 'View/modules/Venda/ListarVenda.php';
    }

    public static function getById()
    {
        $model = new VendaModel();

        parent::setResponseAsJSON($model->getById($_GET['id']));
    }

    public static function save()
    {
        $venda = new VendaModel();

        $venda->id = $_POST['id'];
        $venda->data_venda = $_POST['data_venda'];
        $venda->agendamento = $_POST['agendamento'];
        $venda->id_cliente = $_POST['id_cliente'];
        $venda->id_animal = $_POST['id_animal'];

        $venda->save();

        header("Location: /venda");
    }
}