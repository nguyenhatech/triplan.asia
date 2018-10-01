<?php

namespace App\Repositories\ResortContents;
use App\Repositories\BaseRepository;

class DbResortContentRepository extends BaseRepository implements ResortContentRepository
{
    public function __construct(ResortContent $resortContent)
    {
        $this->model = $resortContent;
    }

}
