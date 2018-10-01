<?php

namespace App\Repositories\Resorts;

use App\Repositories\Entity;

class Resort extends Entity
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [];

    public function services()
    {
        return $this->hasMany('App\Repositories\Services\Service', 'resort_id', 'id')->take(8);
    }
}
