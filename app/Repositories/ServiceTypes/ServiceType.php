<?php

namespace App\Repositories\ServiceTypes;

use App\Repositories\Entity;

class ServiceType extends Entity
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'service_group_id',
        'status'
    ];

    protected $table = 'service_types';

    public $timestamps = true;

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($this->attributes['name']);
    }

    // Trường status
    const ENABLE  = 1;
    const DISABLE = 0;

    public function getStatusText()
    {
        $list = [
            self::ENABLE  => 'Kích hoạt',
            self::DISABLE => 'Chưa kích hoạt'
        ];

        return array_key_exists($this->status, $list) ? $list[$this->status] : 'Không xác định';
    }

    public function translations()
    {
        return $this->hasMany('App\Repositories\ServiceTypeTranslations\ServiceTypeTranslation', 'service_type_id', 'id');
    }

    public function getTranslation($locale = 'vi')
    {
        return $this->hasOne('App\Repositories\ServiceTypeTranslations\ServiceTypeTranslation', 'service_type_id', 'id')->where('locale', $locale)->first();
    }

    public function service_group()
    {
        return $this->belongsTo('App\Repositories\ServiceGroups\ServiceGroup', 'service_group_id', 'id');
    }

}
