<?php

namespace App\Repositories\BookingDetails;
use App\Repositories\BaseRepository;

class DbBookingDetailRepository extends BaseRepository implements BookingDetailRepository
{
    public function __construct(BookingDetail $bookingDetail)
    {
        $this->model = $bookingDetail;
    }

}
