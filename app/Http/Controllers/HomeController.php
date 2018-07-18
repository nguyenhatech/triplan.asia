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
        $place_destinations = $this->place->getByQuery([
            'status' => 1
        ]);

        // Dịch vụ được yêu thích nhất
        $best_services      = $this->service->getByQuery([
            'hot' => 1
        ]);

        return view('web.homes.index')->with([
            'title'              => 'Trang chủ',
            'place_destinations' => $place_destinations,
            'best_services'      => $best_services
        ]);
    }

    public function tours()
    {
        return view('web.searches.tours')->with([
            'title'              => 'Tìm kiếm tours',
        ]);
    }
}
