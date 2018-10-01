<?php

namespace App\Repositories\ResortCombos;
use App\Repositories\BaseRepository;

class DbResortComboRepository extends BaseRepository implements ResortComboRepository
{
    public function __construct(ResortCombo $resortCombo)
    {
        $this->model = $resortCombo;
    }

}
