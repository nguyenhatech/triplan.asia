<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends WebController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function privacy()
    {
        return 'privacy';
    }

    public function policies()
    {
        return 'policies';
    }
}
