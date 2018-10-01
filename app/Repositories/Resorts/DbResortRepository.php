<?php

namespace App\Repositories\Resorts;
use App\Repositories\BaseRepository;

class DbResortRepository extends BaseRepository implements ResortRepository
{
    public function __construct(Resort $resort)
    {
        $this->model = $resort;
    }

}
