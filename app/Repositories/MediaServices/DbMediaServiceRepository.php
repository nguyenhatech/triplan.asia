<?php

namespace App\Repositories\MediaServices;
use App\Repositories\BaseRepository;

class DbMediaServiceRepository extends BaseRepository implements MediaServiceRepository
{
    public function __construct(MediaService $mediaService)
    {
        $this->model = $mediaService;
    }

}
