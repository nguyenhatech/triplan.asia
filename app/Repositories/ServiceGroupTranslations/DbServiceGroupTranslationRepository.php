<?php

namespace App\Repositories\ServiceGroupTranslations;
use App\Repositories\BaseRepository;

class DbServiceGroupTranslationRepository extends BaseRepository implements ServiceGroupTranslationRepository
{
    public function __construct(ServiceGroupTranslation $serviceGroupTranslation)
    {
        $this->model = $serviceGroupTranslation;
    }

}
