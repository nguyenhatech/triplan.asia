<?php

namespace App\Repositories\Services;

use App\Repositories\Entity;

class Service extends Entity
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [];

    public function getImage($type = null)
    {
        if ($type == 'sm') {
            return env('IMAGE_PATH') . '350x200/' . $this->image;
        } else if ($type == 'md') {
            return env('IMAGE_PATH') . '750x390/' . $this->image;
        } else {
            return env('IMAGE_PATH') . $this->image;
        }
    }

    public function getTranslation($locale = 'vi')
    {
        return $this->hasOne('App\Repositories\ServiceTranslations\ServiceTranslation', 'service_id', 'id')->where('locale', $locale)->first();
    }
}
