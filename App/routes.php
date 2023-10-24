<?php

use App\Controller\ {
    DashboardController,
    ClienteController
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


    case '/home':
        DashboardController::index();
        break;

    default:
        header('Location: /home');
        break;
}