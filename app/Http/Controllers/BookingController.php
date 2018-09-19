<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;

class BookingController extends WebController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function bookingStep1(Request $request)
    {
        $this->metadata->setMetaTitle('Thanh toán');

        $data_cart = json_encode(is_null(session('dataCart')) ? (object) [] : session('dataCart'));

        $data_params['APP_URL']              = env('APP_URL');
        $data_params['url_booking_thankyou'] = route('web.booking.thankyou');
        $data_params                         = json_encode($data_params);

        return view('web.bookings.step1')->with([
            'title'       => 'Thông tin booking',
            'data_params' => $data_params,
            'data_cart'    => $data_cart
        ]);
    }

    public function thankyou(Request $request)
    {
        $data_params                         = $request->all();
        $data_params['APP_URL']              = env('APP_URL');
        $data_params                         = json_encode($data_params);

        return view('web.bookings.thankyou')->with([
            'title'   => 'Đặt vé thành công',
            'data_params'   => $data_params
        ]);
    }
}
