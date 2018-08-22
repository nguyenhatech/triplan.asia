<?php

namespace App\Repositories\Services;
use App\Repositories\BaseRepository;

class DbServiceRepository extends BaseRepository implements ServiceRepository
{
    public function __construct(Service $service)
    {
        $this->model = $service;
    }

    /**
     * Lấy dữ liệu
     */
    public function getByQuery($params, $size = 25, $sorting = [])
    {
        $status = array_get($params, 'status', null);
        $place = array_get($params, 'place_id', null);
        $type = array_get($params, 'type', null);
        $group = array_get($params, 'group', null);
        $minPrice = array_get($params, 'min_price', null);
        $maxPrice = array_get($params, 'max_price', null);
        $query  = array_get($params, 'q', null);
        $notInID = array_get($params, 'notInID', null);
        $hot     = array_get($params, 'hot', null);

        $model  = $this->model->join('service_translations', 'services.id', '=', 'service_translations.service_id')
                            ->select('services.*', 'service_translations.name', 'service_translations.slug', 'service_translations.description', 'service_translations.address')
                            ->where('service_translations.locale', \App::getLocale());

        if (! empty($sorting)) {
            $model = $model->orderBy('services.' . $sorting[0], $sorting[1] > 0 ? 'ASC' : 'DESC');
        } else {
            $model = $model->orderBy('services.id', 'DESC');
        }

        if (! is_null($status)) {
            $model = $model->where('status', $status);
        }
        if (! is_null($place)) {
            $model = $model->where('place_id', $place);
        }
        if (! is_null($type)) {
            $model = $model->where('service_type_id', $type);
        }
        if (! is_null($group)) {
            $model = $model->where('service_group_id', $group);
        }
        if (! is_null($minPrice)) {
            $model = $model->where('price', '>=', resetPrice($minPrice, 'VND'));
        }
        if (! is_null($maxPrice)) {
            $model = $model->where('price', '<=', resetPrice($maxPrice, 'VND'));
        }

        if (! is_null($notInID)) {
            $model = $model->whereNotIn('services.id', $notInID);
        }

        if (! is_null($hot)) {
            $model = $model->where('hot', $hot);
        }

        if (! is_null($query)) {
            // $model = $model->whereHas('translations', function ($q) use ($query) {
            //     $q->where('name', 'like', "%{$query}%");
            // });
            $model = $model->where('service_translations.name', 'like', "%{$query}%");
        }

        return $size < 0 ? $model->get() : $model->paginate($size);
    }

    public function getHotTourSearchBar()
    {
        return $this->model->join('service_translations', 'services.id', '=', 'service_translations.service_id')->where('service_translations.locale', \App::getLocale())->where('services.hot', 1)->select('services.*', 'service_translations.name', 'service_translations.slug')->orderBy('services.created_at', 'DESC')->limit(6)->get();
    }

}
