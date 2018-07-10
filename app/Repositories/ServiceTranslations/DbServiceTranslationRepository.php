<?php

namespace App\Repositories\ServiceTranslations;
use App\Repositories\BaseRepository;

class DbServiceTranslationRepository extends BaseRepository implements ServiceTranslationRepository
{
    public function __construct(ServiceTranslation $serviceTranslation)
    {
        $this->model = $serviceTranslation;
    }

}
