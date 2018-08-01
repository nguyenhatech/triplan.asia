<?php

namespace App\Repositories\Places;
use App\Repositories\BaseRepository;

class DbPlaceRepository extends BaseRepository implements PlaceRepository
{
    public function __construct(Place $place)
    {
        $this->model = $place;
    }

    public function getBySlug($slug)
    {
        $model  = $this->model->join('place_translations', 'places.id', '=', 'place_translations.place_id')
                            ->select('places.*', 'place_translations.name', 'place_translations.slug')
                            ->where('place_translations.locale', getLocaleQuery())
                            ->where('place_translations.slug', $slug);
        return $model->first();
    }

    public function getById($id)
    {
        $model  = $this->model->join('place_translations', 'places.id', '=', 'place_translations.place_id')
                            ->select('places.*', 'place_translations.name', 'place_translations.slug')
                            ->where('place_translations.locale', getLocaleQuery())
                            ->where('places.id', $id);
        return $model->first();
    }

    /**
     * Lấy dữ liệu
     */
    public function getByQuery($params, $size = 25, $sorting = [])
    {
        $query  = array_get($params, 'q', null);

        $model  = $this->model->join('place_translations', 'places.id', '=', 'place_translations.place_id')
                            ->select('places.id', 'places.image', 'place_translations.name', 'place_translations.slug')
                            ->where('place_translations.locale', getLocaleQuery())
                            ->where('places.status', 1);

        if (! empty($sorting)) {

            $column_translation = [
                'name'
            ];

            if (in_array($sorting[0], $column_translation)) {
                $table = 'place_translations';
            } else {
                $table = 'places';
            }

            $model = $model->orderBy($table . '.' . $sorting[0], $sorting[1] > 0 ? 'ASC' : 'DESC');

        } else {
            $model = $model->orderBy('id', 'DESC');
        }

        if (! is_null($query)) {
            $model = $model->whereHas('translations', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            });
        }

        return $size < 0 ? $model->get() : $model->paginate($size);
    }

}
