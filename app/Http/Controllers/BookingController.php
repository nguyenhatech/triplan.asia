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
        return view('web.bookings.step1')->with([
            'title'   => 'Thông tin booking'
        ]);
    }
}
