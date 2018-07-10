<?php

namespace App\Repositories\PlaceTranslations;
use App\Repositories\BaseRepository;

class DbPlaceTranslationRepository extends BaseRepository implements PlaceTranslationRepository
{
    public function __construct(PlaceTranslation $placeTranslation)
    {
        $this->model = $placeTranslation;
    }

}
