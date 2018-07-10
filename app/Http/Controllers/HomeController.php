<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;

use App\Repositories\Places\PlaceRepository;

class HomeController extends WebController
{

    public function __construct(PlaceRepository $place)
    {
        parent::__construct();
        $this->place = $place;
    }

    public function index(Request $request)
    {
        // Điểm đến lý tưởng
        $place_destinations = $this->place->getByQuery([]);

        return view('web.homes.index')->with([
            'title' => 'Trang chủ',
            'place_destinations' => $place_destinations
        ]);
    }
}
