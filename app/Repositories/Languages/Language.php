<?php

namespace App\Repositories\Languages;

use App\Repositories\Entity;

class Language extends Entity
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [];

    public function getFlag()
    {
        return $this->image ? env('IMAGE_PATH') . $this->image : '';
    }
}
