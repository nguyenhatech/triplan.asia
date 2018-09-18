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

    public function detail(Request $request, $slug, $id)
    {
        // $request->session()->flush();
        $id = convert_uuid2id($id);
        $service = $this->service->getById($id);
        if (!$service) {
            abort(404);
        }

        $service_involves = $this->service->getByQuery([
            'notInID' => [$service->id]
        ], 8);

        $data_params['APP_URL']           = env('APP_URL');
        $data_params['url_booking_step1'] = route('web.booking.step1');
        $data_params['url_cart'] = route('web.cart.index');
        $data_params['trans']             = __('*');
        $data_params                      = json_encode($data_params);

        $locale = \App::getLocale();
        $this->metadata->setMetaTitle($service->getTranslation($locale)->name);
        $this->metadata->setMetaDescription($service->getTranslation($locale)->name);
        $this->metadata->setOgpimage($service->getImage('sm'));


        // Check xem có trong giỏ hàng ko để lấy ra hiển thị lại
        $dataCart = is_null(session('dataCart')) ? [] : session('dataCart');

        $data_booking = (object) [];
        if (array_key_exists($id, $dataCart)) {
            $data_booking = $dataCart[$id];
        }
        $data_booking = json_encode($data_booking);

        return view('web.services.detail')->with([
            'title'   => 'Chi tiết',
            'service' => $service,
            'service_involves' => $service_involves,
            'data_params' => $data_params,
            'data_booking' => $data_booking
        ]);
    }
}
