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

    /**
     * Search Ajax hompage
     * @param  Request  $request
     * @return Json     $data
     */
    public function search(Request $request)
    {
        $q = array_get($request->all(), 'q', '');
        $places = $this->place->getByQuery(['q' => $q], 10);
        $services = $this->service->getByQuery(['q' => $q], 5);
        foreach ($places as $place) {
            $place->url = $place->getUrl();
        }
        foreach ($services as $service) {
            $service->url = $service->getUrl();
        }
        return response()->json(array_merge($places->all(), $services->all()));
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

        $durations = \App::isLocale('vi') ? Service::TIME_FILTERS : Service::EN_TIME_FILTERS;
        $service_groups = $this->serviceGroup->getByQuery([], -1);
        $service_types = $this->serviceType->getByQuery([], -1);
        $tours = $this->service->getByQuery($params);

        $this->metadata->setMetaTitle($this->createMetaTitlePlace($place));
        $this->metadata->setDescription($this->createMetaDescriptionPlace($place));
        $this->metadata->setMetaKeyword($this->createMetaKeywordPlace($place));
        $this->metadata->setOgpimage($place->getImage('sm'));

        return view('web.places.show')->with([
            'place'             => $place,
            'places'            => $places,
            'durations'         => $durations,
            'service_groups'    => $service_groups,
            'service_types'     => $service_types->groupBy('service_group_id'),
            'tours'             => $tours,
            'hotTours'          => $hotTours
        ]);
    }

    public function vietnam()
    {
        $locale = \App::getLocale();
        $places = $this->place->getVnPlaces(8);
        $services = $this->service->getVnServices(9);

        return view('web.places.vietnam')->with([
            'places'       => $places,
            'services'     => $services,
            'locale'       => $locale
        ]);
    }

    public function international()
    {
        $locale = \App::getLocale();
        $places = $this->place->getInterPlaces(8);
        $services = $this->service->getInterServices(9);

        return view('web.places.international')->with([
            'places'       => $places,
            'services'     => $services,
            'locale'       => $locale
        ]);
    }
}
