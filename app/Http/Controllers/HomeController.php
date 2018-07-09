<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;

class HomeController extends WebController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        return view('welcome')->with([

        ]);
    }
}
