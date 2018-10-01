<?php

namespace App\Repositories\ResortContents;

use App\Repositories\Entity;

class ResortContent extends Entity
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [];

    public function resort()
    {
        return $this->belongsTo('App\Repositories\Resorts\Resort', 'resort_id', 'id');
    }

    public function service_group()
    {
        return $this->belongsTo('App\Repositories\ServiceGroups\ServiceGroup', 'service_group_id', 'id');
    }
}
