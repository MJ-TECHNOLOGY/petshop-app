<?php

use App\Controller\{
    DashboardController,
    ClienteController,
    AnimalController,
    VendaController
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


    case '/home':
        DashboardController::index();
        break;

    default:
        header('Location: /home');
        break;
}
