<?php

namespace App\Repositories\Resorts;
use App\Repositories\BaseRepository;

class DbResortRepository extends BaseRepository implements ResortRepository
{
    public function __construct(Resort $resort)
    {
        $this->model = $resort;
    }

    public function getBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

}
