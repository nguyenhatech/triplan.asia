<?php

namespace App\Repositories\ComfortTranslations;
use App\Repositories\BaseRepository;

class DbComfortTranslationRepository extends BaseRepository implements ComfortTranslationRepository
{
    public function __construct(ComfortTranslation $comfortTranslation)
    {
        $this->model = $comfortTranslation;
    }

}
