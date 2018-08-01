<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;

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
        $places = $this->place->getByQuery(['status' => 1]);
        $hotTours = $this->service->getHotTourSearchBar();

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
            'best_services'      => $best_services,
            'places'             => $places,
            'hotTours'           => $hotTours
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

        return view('web.searches.tours')->with([
            'title' => 'Tìm kiếm tours',
            'place' => $place,
            'durations'      => $durations,
            'service_groups' => $service_groups,
            'service_types'  => $service_types->groupBy('service_group_id'),
            'tours'          => $tours
        ]);
    }
}
