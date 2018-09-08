<?php

namespace App\Repositories\Banners;
use App\Repositories\BaseRepository;

class DbBannerRepository extends BaseRepository implements BannerRepository
{
    public function __construct(Banner $banner)
    {
        $this->model = $banner;
    }

    public function getForHome()
    {
        return $this->model->where('status', 1)->limit(3)->get();
    }

}
