<?php

namespace App\Repositories\ServiceGroups;
use App\Repositories\BaseRepository;

class DbServiceGroupRepository extends BaseRepository implements ServiceGroupRepository
{
    public function __construct(ServiceGroup $serviceGroup)
    {
        $this->model = $serviceGroup;
    }

    public function getByQuery($params, $size = 25, $sorting = [])
    {
        $status           = array_get($params, 'status', null);
        $query            = array_get($params, 'q', null);

        $model  = $this->model->join('service_group_translations', 'service_groups.id', '=', 'service_group_translations.service_group_id')
                            ->select('service_groups.*', 'service_group_translations.name', 'service_group_translations.slug')
                            ->where('service_group_translations.locale', getLocaleQuery());

        if (! empty($sorting)) {

            $column_translation = [
                'name'
            ];

            if (in_array($sorting[0], $column_translation)) {
                $table = 'service_group_translations';
            } else {
                $table = 'service_groups';
            }

            $model = $model->orderBy($table . '.' . $sorting[0], $sorting[1] > 0 ? 'ASC' : 'DESC');

        } else {
            $model = $model->orderBy('service_groups.id', 'DESC');
        }

        if (! is_null($status)) {
            $model = $model->where('service_groups.status', $status);
        }

        if (! is_null($query)) {
            $model = $model->whereHas('translations', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            });
        }

        return $size < 0 ? $model->get() : $model->paginate($size);
    }
}
