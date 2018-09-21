<?php

namespace App\Repositories\BookingDetails;

use App\Repositories\Entity;

class BookingDetail extends Entity
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [];

    public function service()
    {
        return $this->belongsTo('App\Repositories\Services\Service', 'service_id', 'id');
    }
}
