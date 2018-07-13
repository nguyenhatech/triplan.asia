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
        $query  = array_get($params, 'q', null);
        $notInID  = array_get($params, 'notInID', null);

        $model  = $this->model;

        if (! empty($sorting)) {

            $model = $model->orderBy($sorting[0], $sorting[1] > 0 ? 'ASC' : 'DESC');
        } else {
            $model = $model->orderBy('id', 'DESC');
        }

        if (! is_null($status)) {
            $model = $model->where('status', $status);
        }

        if (! is_null($notInID)) {
            $model = $model->whereNotIn('id', $notInID);
        }

        if (! is_null($query)) {
            $model = $model->whereHas('translations', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            });
        }

        return $size < 0 ? $model->get() : $model->paginate($size);
    }

}
