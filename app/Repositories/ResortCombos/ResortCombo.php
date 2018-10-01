<?php

namespace App\Repositories\ResortCombos;

use App\Repositories\Entity;

class ResortCombo extends Entity
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [];

    public function resort()
    {
        return $this->belongsTo('App\Repositories\Resorts\Resort', 'resort_id', 'id');
    }

    // Lấy danh sách services
    public function findServices($servicesId)
    {
        $serviceMo = app()->make('App\Repositories\Services\Service');

        $data = $serviceMo->find($servicesId);

        if (!is_null($data)) {
            $data = $data->map(function($service) {
                $translation = $service->getTranslation(LANGUAGE_DEFAULT);

                return [
                    'id'            => $service->id,
                    'image'         => $service->image,
                    'thumb_path'    => $service->getImage('sm'),
                    'name'          => $translation->name,
                ];
            });
        }

        return $data;
    }
}
