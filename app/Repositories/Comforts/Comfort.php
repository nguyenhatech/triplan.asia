<?php

namespace App\Repositories\Comforts;

use App\Repositories\Entity;

class Comfort extends Entity
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [];

    public function getTranslation($locale = 'vi')
    {
        return $this->hasOne('App\Repositories\ComfortTranslations\ComfortTranslation', 'comfort_id', 'id')->where('locale', $locale)->first();
    }

}
