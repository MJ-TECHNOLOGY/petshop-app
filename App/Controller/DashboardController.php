<?php

namespace App\Controller;

class DashboardController extends Controller
{
    public static function index()
    {
        //parent::isAuthenticated();

        include 'View/modules/Dashboard/Dashboard.php';
    }
}