<?php

namespace App\Http\Controllers;

use domain\Facades\MaterialFacade\MaterialFacade;
use Inertia\Inertia;


/**
 * Home Controller
 * php version 8.1
 *
 * */
class HomeController extends Controller
{

    /**
     * Dashboard
     *
     * @return void
     */
    public function index()
    {
        $response = [];
       
        return Inertia::render('Home/index', $response);
    }
}
