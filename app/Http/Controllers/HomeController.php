<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;

use App\Repositories\Places\PlaceRepository;
use App\Repositories\Services\ServiceRepository;

class HomeController extends WebController
{

    public function __construct(PlaceRepository $place, ServiceRepository $service)
    {
        parent::__construct();
        $this->place   = $place;
        $this->service = $service;
    }

    public function index(Request $request)
    {
        // Điểm đến lý tưởng
        $place_destinations = $this->place->getByQuery([]);

        // Dịch vụ được yêu thích nhất
        $best_services      = $this->service->getByQuery([]);

        // foreach ($best_services as $key => $value) {
        //     dd($value->getTranslation());
        // }

        return view('web.homes.index')->with([
            'title'              => 'Trang chủ',
            'place_destinations' => $place_destinations,
            'best_services'      => $best_services
        ]);
    }
}
