<?php

namespace App\Repositories\MediaServices;

use App\Repositories\Entity;

class MediaService extends Entity
{

    protected $table = 'media_service';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [];

    public function getImage($type = null)
    {
        if ($type == 'tn') {
            return env('IMAGE_PATH') . 'tiny/' . $this->source;
        } else if ($type == 'sm') {
            return env('IMAGE_PATH') . 'small/' . $this->source;
        } else if ($type == 'md') {
            return env('IMAGE_PATH') . 'medium/' . $this->source;
        } else {
            return env('IMAGE_PATH') . $this->source;
        }
    }
}
