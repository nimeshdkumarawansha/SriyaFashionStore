<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Parent Controller
 * php version 8.1
 * */
class ParentController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
}
