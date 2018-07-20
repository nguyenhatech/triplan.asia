<?php

namespace App\Repositories\ServiceGroups;

use App\Repositories\Entity;

class ServiceGroup extends Entity
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [];

    public function service_types()
    {
        return $this->hasMany('App\Repositories\ServiceTypes\ServiceType', 'service_group_id', 'id');
    }
}
