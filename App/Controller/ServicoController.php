<?php

namespace App\Controller;

use App\Model\ServicoModel;
use App\Controller\Controller;

class ServicoController extends Controller
{
    public static function index()
    {
        //parent::isAuthenticated();

        $model = new ServicoModel();
        $model->getAllRows();

        include 'View/modules/Servico/ListarServico.php';
    }

    public static function getAll()
    {
        //parent::isAuthenticated();

        $model = new ServicoModel();
        $model->getAllRows();
       
        parent::setResponseAsJSON($model->rows);
    }

    public static function getById()
    {
        //parent::isAuthenticated();
        
        $model = new ServicoModel();

        parent::setResponseAsJSON($model->getById($_GET['id']));
    }


    public static function save()
    {
        //parent::isAuthenticated();

        $servico = new ServicoModel();

        $servico->id = $_POST['id'];
        $servico->descricao = $_POST['descricao'];
        $servico->valor = $_POST['valor'];

        $servico->save();

        header("Location: /servico");
    }

    public static function delete()
    {
        //parent::isAuthenticated();

        $model = new ServicoModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}