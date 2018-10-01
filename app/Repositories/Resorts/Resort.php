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

    public function resort_contents()
    {
        return $this->hasMany('App\Repositories\ResortContents\ResortContent', 'resort_id', 'id');
    }

    public function resort_combos()
    {
        return $this->hasMany('App\Repositories\ResortCombos\ResortCombo', 'resort_id', 'id');
    }

    public function services()
    {
        return $this->hasMany('App\Repositories\Services\Service', 'resort_id', 'id')->take(8);
    }
}
