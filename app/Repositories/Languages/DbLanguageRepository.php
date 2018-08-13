<?php

namespace App\Repositories\Languages;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Cache;

class DbLanguageRepository extends BaseRepository implements LanguageRepository
{
    public function __construct(Language $language)
    {
        $this->model = $language;
    }

    public function getAllLanguagesByActive()
    {
        return Cache::remember('languages', 10, function()
        {
            return $this->model->where('status', 1)->get();
        });
    }
}
