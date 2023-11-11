<?php

namespace App\Controller;

use App\Model\VendaModel;
use App\Controller\Controller;

class VendaController extends Controller
{
    public static function getList()
    {
        //parent::isAuthenticated();

        $model = new VendaModel();
        $data = $model->getAllRows();

        parent::setResponseAsJSON($data);
    }

    public static function index()
    {
        //parent::isAuthenticated();

        $model = new VendaModel();
        $model->getAllRows();
        $model->getAllCliente();
        $model->getAllAnimal();

        include 'View/modules/Venda/ListarVenda.php';
    }

    public static function getById()
    {
        //parent::isAuthenticated();

        $model = new VendaModel();

        parent::setResponseAsJSON($model->getById($_GET['id']));
    }

    public static function save()
    {
        //parent::isAuthenticated();

        $venda = new VendaModel();

        $venda->id = $_POST['id'];
        $venda->agendamento = $_POST['agendamento'];
        $venda->id_cliente = $_POST['id_cliente'];
        $venda->id_animal = $_POST['id_animal'];

        $venda->save();

        header("Location: /venda");
    }

    public static function delete()
    {
        //parent::isAuthenticated();

        $model = new VendaModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}