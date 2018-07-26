<?php

namespace App\Repositories\Currencies;
use App\Repositories\BaseRepository;

class DbCurrencyRepository extends BaseRepository implements CurrencyRepository
{
    public function __construct(Currency $currency)
    {
        $this->model = $currency;
    }

}
