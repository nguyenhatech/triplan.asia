<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;

use App\Repositories\Services\ServiceRepository;

class ServiceController extends WebController
{

    public function __construct(ServiceRepository $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function detail(Request $request, $id)
    {
        $service = $this->service->getById($id);

        return view('web.services.detail')->with([
            'title'   => 'Chi tiết',
            'service' => $service
        ]);
    }
}
