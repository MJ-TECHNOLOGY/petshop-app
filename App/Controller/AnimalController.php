<?php

namespace App\Controller;

use App\Model\AnimalModel;
use App\Controller\Controller;

class AnimalController extends Controller
{
    public static function index()
    {
        $model = new AnimalModel();
        $model->getAllRows();
        $model->getAllCliente();

        include 'View/modules/Animal/ListarAnimal.php';
    }

    public static function getAll(){
        $model = new AnimalModel();
        $model->getAllRows();
       
        parent::setResponseAsJSON($model->rows);
    }

    public static function getById()
    {
        $model = new AnimalModel();

        parent::setResponseAsJSON($model->getById($_GET['id']));
    }


    public static function save()
    {
        $animal = new AnimalModel();

        $animal->id = $_POST['id'];
        $animal->nome_animal = $_POST['nome_animal'];
        $animal->raca = $_POST['raca'];
        $animal->idade = $_POST['idade'];
        $animal->sexo = $_POST['sexo'];
        $animal->cor = $_POST['cor'];
        $animal->observacao = $_POST['observacao'];
        $animal->id_cliente = $_POST['id_cliente'];
        

        $animal->save();

        header("Location: /animal");
    }

    public static function delete()
    {
        $model = new AnimalModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}