<?php

namespace App\Controller;

class DashboardController extends Controller
{
    public static function index()
    {
        parent::isProtected();

        include PATH_VIEW . '/dashboard.php';
    }
}