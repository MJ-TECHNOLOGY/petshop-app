<?php

use App\Controller\{
    DashboardController,
    ClienteController,
    AnimalController,
    VendaController,
    CategoriaController,
    ProdutoController,
    VendaProdutoController,
    LoginController,
    ServicoController,
    BackupController
};

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {

    case '/cliente':
        ClienteController::index();
        break;

    case '/cliente/save':
        ClienteController::save();
        break;

    case '/cliente/get-by-id':
        ClienteController::getById();
        break;
    case '/cliente/delete':
        ClienteController::delete();
        break;


    case '/animal':
        AnimalController::index();
        break;

    case '/animal/save':
        AnimalController::save();
        break;

    case '/animal/get-by-id':
        AnimalController::getById();
        break;
    case '/animal/delete':
        AnimalController::delete();
        break;


    case '/categoria':
        CategoriaController::index();
        break;

    case '/categoria/save':
        CategoriaController::save();
        break;

    case '/categoria/get-by-id':
        CategoriaController::getById();
        break;
    case '/categoria/delete':
        CategoriaController::delete();
        break;


    case '/servico':
        ServicoController::index();
        break;

    case '/servico/save':
        ServicoController::save();
        break;

    case '/servico/get-by-id':
        ServicoController::getById();
        break;
    case '/servico/delete':
        ServicoController::delete();
        break;


    case '/venda':
        VendaController::index();
        break;

    case '/venda/save':
        VendaController::save();
        break;

    case '/venda/get-by-id':
        VendaController::getById();
        break;
    case '/venda/delete':
        VendaController::delete();
        break;


    case '/produto':
        ProdutoController::index();
        break;

    case '/produto/save':
        ProdutoController::save();
        break;

    case '/produto/get-by-id':
        ProdutoController::getById();
        break;
    case '/produto/delete':
        ProdutoController::delete();
        break;


    case '/venda_produto':
        VendaProdutoController::index();
        break;

    case '/venda_produto/save':
        VendaProdutoController::save();
        break;

    case '/venda_produto/get-by-id':
        VendaProdutoController::getById();
        break;
    case '/venda_produto/delete':
        VendaProdutoController::delete();
        break;


    case '/login':
        LoginController::form();
        break;

    case '/login/auth':
        LoginController::auth();
        break;

    case '/logout':
        LoginController::logout();
        break;

    case '/usuario':
        LoginController::index();
        break;

    case '/login/save':
        LoginController::save();
        break;

    case '/login/get-all':
        LoginController::getAll();
        break;

    case '/login/get-by-id':
        LoginController::getById();
        break;


    case '/home':
        DashboardController::index();
        break;

    case '/backup':
        BackupController::backup();
        break;

    default:
        header('Location: /login');
        break;
}
