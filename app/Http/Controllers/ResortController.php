<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;

use App\Repositories\Services\ServiceRepository;
use App\Repositories\Resorts\ResortRepository;
use Lang;

class ResortController extends WebController
{

    public function __construct(ServiceRepository $service, ResortRepository $resort)
    {
        parent::__construct();
        $this->service = $service;
        $this->resort  = $resort;
    }

    public function show($id)
    {
        $resort = $this->resort->getById($id);
        if (!$resort) {
            abort(404);
        }
        if ($resort->theme_id == 1) {
            return view('web.resorts.index1')->with([
                'resort'    => $resort
            ]);
        } else {
            return view('web.resorts.index2')->with([
                'resort'    => $resort
            ]);
        }
    }
}
