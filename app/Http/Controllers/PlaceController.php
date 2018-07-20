<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;

use App\Repositories\Places\PlaceRepository;

class PlaceController extends WebController
{

    public function __construct(PlaceRepository $place)
    {
        parent::__construct();
        $this->place = $place;
    }

    public function search(Request $request)
    {
        $q = array_get($request->all(), 'q', '');
        $places = $this->place->getByQuery(['q' => $q], 10);
        return response()->json($places->all());
    }
}
