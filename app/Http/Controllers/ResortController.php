<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;

use App\Repositories\Services\ServiceRepository;
use App\Repositories\Resorts\ResortRepository;
use App\Repositories\ServiceTypes\ServiceTypeRepository;
use App\Repositories\ServiceGroups\ServiceGroupRepository;
use Lang;

class ResortController extends WebController
{

    public function __construct(
        ServiceRepository $service,
        ResortRepository $resort,
        ServiceTypeRepository $serviceType,
        ServiceGroupRepository $serviceGroup
    )
    {
        parent::__construct();
        $this->service      = $service;
        $this->resort       = $resort;
        $this->serviceGroup = $serviceGroup;
        $this->serviceType  = $serviceType;
    }

    public function show($slug)
    {
        $resort = $this->resort->getBySlug($slug);
        if (!$resort) {
            abort(404);
        }
        $this->metadata->setMetaTitle($resort->name);
        $this->metadata->setDescription($resort->name . ' ' . $resort->slogan);
        $this->metadata->setMetaKeyword($resort->name . ',nghỉ dưỡng ' . $resort->name . ',đi ' . $resort->name . ',team building ' . $resort->name);
        $this->metadata->setOgpimage($resort->getImage('sm'));

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

    public function service(Request $request, $slug)
    {
        $resort = $this->resort->getBySlug($slug);
        if (!$resort) {
            abort(404);
        }
        $params = $request->all();
        $params['resort_id'] = $resort->id;

        $service_groups = $this->serviceGroup->getByQuery([], -1);
        $service_types = $this->serviceType->getByQuery([], -1);
        $tours = $this->service->getByQuery($params);

        $this->metadata->setMetaTitle($resort->name);
        $this->metadata->setDescription($resort->name . ' ' . $resort->slogan);
        $this->metadata->setMetaKeyword($resort->name . ',' . $resort->slogan . ',nghỉ dưỡng ' . $resort->name . ',đi ' . $resort->name . ',team building ' . $resort->name);
        $this->metadata->setOgpimage($resort->getImage('sm'));

        return view('web.resorts.service')->with([
            'resort'             => $resort,
            'service_groups'    => $service_groups,
            'service_types'     => $service_types->groupBy('service_group_id'),
            'tours'             => $tours
        ]);
    }
}
