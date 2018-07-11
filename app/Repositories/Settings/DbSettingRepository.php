<?php

namespace App\Repositories\Settings;
use App\Repositories\BaseRepository;

class DbSettingRepository extends BaseRepository implements SettingRepository
{
    public function __construct(Setting $setting)
    {
        $this->model = $setting;
    }

}
