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

    public function getImage($type = false)
    {
        if ($this->image == '') return get_asset('images/places/place_default.png');

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
        return $this->hasOne('App\Repositories\PlaceTranslations\PlaceTranslation', 'place_id', 'id')->where('locale', $locale)->first();
    }
}
