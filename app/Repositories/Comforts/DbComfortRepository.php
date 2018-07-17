<?php

namespace App\Repositories\Comforts;
use App\Repositories\BaseRepository;

class DbComfortRepository extends BaseRepository implements ComfortRepository
{
    public function __construct(Comfort $comfort)
    {
        $this->model = $comfort;
    }

}
