<?php

namespace App\Controller;

use App\Model\ClienteModel;
use App\Controller\Controller;

class ClienteController extends Controller
{
    public static function index()
    {
        $model = new ClienteModel();
        $model->getAllRows();

        include 'View/modules/Cliente/ListarCliente.php';
    }

    public static function getAll(){
        $model = new ClienteModel();
        $model->getAllRows();
       
        parent::setResponseAsJSON($model->rows);
    }

    public static function getById()
    {
        $model = new ClienteModel();

        parent::setResponseAsJSON($model->getById($_GET['id']));
    }


    public static function save()
    {
        $cliente = new ClienteModel();

        $cliente->id = $_POST['id'];
        $cliente->nome = $_POST['nome'];
        $cliente->cpf = $_POST['cpf'];
        $cliente->email = $_POST['email'];
        $cliente->data_nascimento = $_POST['data_nascimento'];
        $cliente->telefone = $_POST['telefone'];
        $cliente->logradouro = $_POST['logradouro'];
        $cliente->numero = $_POST['numero'];
        $cliente->bairro = $_POST['bairro'];
        $cliente->cidade = $_POST['cidade'];
        $cliente->cep = $_POST['cep'];
        $cliente->ponto_referencia = $_POST['ponto_referencia'];
        
        $cliente->save();

        header("Location: /cliente");
    }

    public static function delete()
    {
        $model = new ClienteModel();

        $model->delete( (int) $_GET['id']);

        parent::setResponseAsJSON($model);
    }
}