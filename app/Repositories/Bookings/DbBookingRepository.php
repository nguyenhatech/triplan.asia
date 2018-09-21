<?php

namespace App\Repositories\Bookings;
use App\Repositories\BaseRepository;

class DbBookingRepository extends BaseRepository implements BookingRepository
{
    public function __construct(Booking $booking)
    {
        $this->model = $booking;
    }

}
