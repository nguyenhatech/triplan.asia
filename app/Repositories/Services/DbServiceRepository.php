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
        $place = array_get($params, 'place', null);
        $type = array_get($params, 'type', null);
        $group = array_get($params, 'group', null);
        $minPrice = array_get($params, 'min_price', null);
        $maxPrice = array_get($params, 'max_price', null);
        $query  = array_get($params, 'q', null);
        $notInID = array_get($params, 'notInID', null);
        $hot     = array_get($params, 'hot', null);

        $model  = $this->model->join('service_translations', 'services.id', '=', 'service_translations.service_id')
                            ->select('services.*', 'service_translations.name', 'service_translations.slug', 'service_translations.description', 'service_translations.what_to_expect', 'service_translations.activity_information', 'service_translations.additional_information', 'service_translations.tip', 'service_translations.how_to_use', 'service_translations.cancelation_policy', 'service_translations.address')
                            ->where('service_translations.locale', getLocaleQuery());

        if (! empty($sorting)) {
            $model = $model->orderBy($sorting[0], $sorting[1] > 0 ? 'ASC' : 'DESC');
        } else {
            $model = $model->orderBy('id', 'DESC');
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
            $model = $model->whereNotIn('id', $notInID);
        }

        if (! is_null($hot)) {
            $model = $model->where('hot', $hot);
        }

        if (! is_null($query)) {
            $model = $model->whereHas('translations', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            });
        }

        return $size < 0 ? $model->get() : $model->paginate($size);
    }

}
