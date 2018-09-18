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

    public function getImage($type = null)
    {
        if ($type == 'tn') {
            return env('IMAGE_PATH') . 'tiny/' . $this->image;
        } else if ($type == 'sm') {
            return env('IMAGE_PATH') . 'small/' . $this->image;
        } else if ($type == 'md') {
            return env('IMAGE_PATH') . 'medium/' . $this->image;
        } else {
            return env('IMAGE_PATH') . $this->image;
        }
    }

    public function getTranslation($locale = 'vi')
    {
        return $this->hasOne('App\Repositories\ServiceGroupTranslations\ServiceGroupTranslation', 'service_group_id', 'id')->where('locale', $locale)->first();
    }
}
