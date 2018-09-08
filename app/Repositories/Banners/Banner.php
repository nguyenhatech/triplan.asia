<?php

namespace App\Repositories\Banners;

use App\Repositories\Entity;

class Banner extends Entity
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [];

    public function getImage()
    {
        return env('IMAGE_PATH') . $this->image;
    }
}
