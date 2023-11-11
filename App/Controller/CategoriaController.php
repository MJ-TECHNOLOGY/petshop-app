<?php

namespace App\Controller;

use App\Model\CategoriaModel;
use App\Controller\Controller;

class CategoriaController extends Controller
{
    public static function index()
    {
        //parent::isAuthenticated();

        $model = new CategoriaModel();
        $model->getAllRows();

        include 'View/modules/Categoria/ListarCategoria.php';
    }

    public static function getAll()
    {
        //parent::isAuthenticated();

        $model = new CategoriaModel();
        $model->getAllRows();
       
        parent::setResponseAsJSON($model->rows);
    }

    public static function getById()
    {
        //parent::isAuthenticated();
        
        $model = new CategoriaModel();

        parent::setResponseAsJSON($model->getById($_GET['id']));
    }


    public static function save()
    {
        //parent::isAuthenticated();

        $categoria = new CategoriaModel();

        $categoria->id = $_POST['id'];
        $categoria->descricao = $_POST['descricao'];

        $categoria->save();

        header("Location: /categoria");
    }

    public static function delete()
    {
        //parent::isAuthenticated();

        $model = new CategoriaModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}