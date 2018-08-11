<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;

use App\Repositories\Services\ServiceRepository;
use Lang;

class ServiceController extends WebController
{

    public function __construct(ServiceRepository $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function detail(Request $request, $id)
    {
        $service = $this->service->getById($id);

        $service_involves = $this->service->getByQuery([
            'notInID' => [$service->id]
        ], 8);

        $data_params['APP_URL']           = env('APP_URL');
        $data_params['url_booking_step1'] = route('web.booking.step1');
        $data_params['trans']             = __('*');
        $data_params                      = json_encode($data_params);

        return view('web.services.detail')->with([
            'title'   => 'Chi tiết',
            'service' => $service,
            'service_involves' => $service_involves,
            'data_params' => $data_params
        ]);
    }
}
