<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;

use App\Repositories\Services\ServiceRepository;
use Lang;

class ResortController extends WebController
{

    public function __construct(ServiceRepository $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function show($id)
    {
        return view('web.resorts.index1');
    }
}
