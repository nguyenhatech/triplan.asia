<?php

namespace App\Repositories\ServiceTypes;
use App\Repositories\BaseRepository;

class DbServiceTypeRepository extends BaseRepository implements ServiceTypeRepository
{
    public function __construct(ServiceType $serviceType)
    {
        $this->model = $serviceType;
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Lấy dữ liệu
     */
    public function getByQuery($params, $size = 25, $sorting = [])
    {
        $status = array_get($params, 'status', null);
        $service_group_id = array_get($params, 'service_group_id', null);
        $query  = array_get($params, 'q', null);

        $model  = $this->model->join('service_type_translations', 'service_types.id', '=', 'service_type_translations.service_type_id')
                            ->select('service_types.*', 'service_type_translations.name')
                            ->where('service_type_translations.locale', getLocaleQuery());

        if (! empty($sorting)) {
            $model = $model->orderBy($sorting[0], $sorting[1] > 0 ? 'ASC' : 'DESC');
        } else {
            $model = $model->orderBy('id', 'DESC');
        }

        if (! is_null($service_group_id)) {
            $model = $model->where('service_group_id', $service_group_id);
        }

        if (! is_null($status)) {
            $model = $model->where('status', $status);
        }

        if (! is_null($query)) {
            $model = $model->where(function($q) use ($query) {
                return $q->where('name', 'like', "%{$query}%");
            });
        }

        return $size < 0 ? $model->get() : $model->paginate($size);
    }

}
