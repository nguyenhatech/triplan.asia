<?php

namespace App\Repositories\Places;

use App\Repositories\Entity;

class Place extends Entity
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [];

    public function getImage($thumbnail = false)
    {
        if ($this->image == '') return get_asset('images/places/place_default.png');

        return env('IMAGE_PATH') . $this->image;
    }

    public function getTranslation($locale = 'vi')
    {
        return $this->hasOne('App\Repositories\PlaceTranslations\PlaceTranslation', 'place_id', 'id')->where('locale', $locale)->first();
    }
}
