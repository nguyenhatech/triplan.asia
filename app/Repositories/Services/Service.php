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

    public function getImage()
    {
        if ($this->image) {
            return env('IMAGE_PATH') . $this->image;
        }
        return $this->image;
    }

    public function getTranslation($locale = 'vi')
    {
        return $this->hasOne('App\Repositories\ServiceTranslations\ServiceTranslation', 'service_id', 'id')->where('locale', $locale)->first();
    }
}
