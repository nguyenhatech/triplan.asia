<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Services\Service;

use App\Repositories\Places\PlaceRepository;
use App\Repositories\Services\ServiceRepository;
use App\Repositories\ServiceTypes\ServiceTypeRepository;
use App\Repositories\ServiceGroups\ServiceGroupRepository;

class HomeController extends WebController
{

    public function __construct(
        PlaceRepository $place,
        ServiceRepository $service,
        ServiceTypeRepository $serviceType,
        ServiceGroupRepository $serviceGroup)
    {
        parent::__construct();
        $this->place         = $place;
        $this->service       = $service;
        $this->serviceType   = $serviceType;
        $this->serviceGroup  = $serviceGroup;
    }

    // Thay đổi ngôn ngữ hệ thống
    public function changeLanguage($language)
    {
        \Session::put('locale', $language);

        return redirect()->back();
    }

    public function index(Request $request)
    {
        // Search Box
        $places = \Cache::remember('places', 12*60, function(){
            return $this->place->getByQuery(['status' => 1], 12);
        });
        $hotTours = \Cache::remember('hot_tours', 12*60, function(){
            return $this->service->getHotTourSearchBar();
        });

        // Điểm đến lý tưởng
        // $place_destinations = $this->place->getByQuery(['hot' => 1], 4);
        $vn_destinations = $this->place->getVnPlaces(8);
        $over_destinations = $this->place->getInterPlaces(8);

        // Dịch vụ được yêu thích nhất
        $best_services      = $this->service->getByQuery(['hot' => 1], 9);

        return view('web.homes.index')->with([
            'vn_destinations'       => $vn_destinations,
            'over_destinations'     => $over_destinations,
            'best_services'         => $best_services,
            'places'                => $places,
            'hotTours'              => $hotTours
        ]);
    }

    public function tours(Request $request)
    {
        $place = $this->place->getById(array_get($request->all(), 'place', ''));
        if (!$place) {
            abort(404);
        }

        $durations = Service::TIME_FILTERS;
        $service_groups = $this->serviceGroup->getByQuery([], -1);
        $service_types = $this->serviceType->getByQuery([], -1);
        $tours = $this->service->getByQuery($request->all());

        return view('web.places.show')->with([
            'place' => $place,
            'durations'      => $durations,
            'service_groups' => $service_groups,
            'service_types'  => $service_types->groupBy('service_group_id'),
            'tours'          => $tours
        ]);
    }
}
