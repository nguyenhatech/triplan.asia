<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;

use App\Repositories\Services\Service;
use App\Repositories\Services\ServiceRepository;
use App\Repositories\Places\PlaceRepository;
use App\Repositories\ServiceTypes\ServiceTypeRepository;
use App\Repositories\ServiceGroups\ServiceGroupRepository;

class PlaceController extends WebController
{

    public function __construct(
        PlaceRepository $place,
        ServiceRepository $service,
        ServiceTypeRepository $serviceType,
        ServiceGroupRepository $serviceGroup
    )
    {
        parent::__construct();
        $this->place = $place;
        $this->service = $service;
        $this->serviceType = $serviceType;
        $this->serviceGroup = $serviceGroup;
    }

    public function search(Request $request)
    {
        $q = array_get($request->all(), 'q', '');
        $places = $this->place->getByQuery(['q' => $q], 10);
        foreach ($places as $place) {
            $place->url = $place->getUrl();
        }
        return response()->json($places->all());
    }

    public function show(Request $request, $slug)
    {
        $place = $this->place->getBySlug($slug);
        if (!$place) {
            abort(404);
        }
        $places = \Cache::remember('places', 12*60, function(){
            return $this->place->getByQuery(['status' => 1]);
        });
        $hotTours = \Cache::remember('hot_tours', 12*60, function(){
            return $this->service->getHotTourSearchBar();
        });
        $params = $request->all();
        $params['place_id'] = $place->id;

        $durations = Service::TIME_FILTERS;
        $service_groups = $this->serviceGroup->getByQuery([], -1);
        $service_types = $this->serviceType->getByQuery([], -1);
        $tours = $this->service->getByQuery($params);

        return view('web.searches.tours')->with([
            'title' => 'Du lịch ' . $place->name,
            'place' => $place,
            'places' => $places,
            'durations'      => $durations,
            'service_groups' => $service_groups,
            'service_types'  => $service_types->groupBy('service_group_id'),
            'tours'          => $tours,
            'hotTours'          => $hotTours
        ]);
    }
}
