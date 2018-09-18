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

    public function translations()
    {
        return $this->hasMany('App\Repositories\PlaceTranslations\PlaceTranslation', 'place_id', 'id');
    }

    public function getTranslation($locale = 'vi')
    {
        return $this->hasOne('App\Repositories\PlaceTranslations\PlaceTranslation', 'place_id', 'id')->where('locale', $locale)->first();
    }

    public function country()
    {
        return $this->belongsTo('App\Repositories\Countries\Country', 'country_id');
    }

    public function getUrl()
    {
        return route('web.show_place', ['slug' => $this->slug]);
    }

    public function services()
    {
        return $this->hasMany('App\Repositories\Services\Service', 'place_id', 'id');
    }
}
