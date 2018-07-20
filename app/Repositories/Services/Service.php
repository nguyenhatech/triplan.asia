<?php

namespace App\Repositories\Services;

use App\Repositories\Entity;

class Service extends Entity
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [];

    // Trường time_confirm: Thời gian xác nhận dịch vụ
    const IMMEDIATELY = 1; // Ngay lập tức
    const LIMIT_24    = 2; // Trong vòng 24H
    const LIMIT_48    = 3; // Trong vòng 48H

    const TIME_FILTERS = [
        2 => '1 đến 2 ngày',
        5 => '3 đến 5 ngày',
        6 => 'Hơn 5 ngày'
    ];

    public function getImage($type = null)
    {
        if ($type == 'sm') {
            return env('IMAGE_PATH') . '350x200/' . $this->image;
        } else if ($type == 'md') {
            return env('IMAGE_PATH') . '750x390/' . $this->image;
        } else {
            return env('IMAGE_PATH') . $this->image;
        }
    }

    public function getTimeConfirmText()
    {
        $list = [
            self::IMMEDIATELY => 'Xác nhận ngay lập tức',
            self::LIMIT_24    => 'Xác nhận trong vòng 24H',
            self::LIMIT_48    => 'Xác nhận trong vòng 48H'
        ];

        return array_key_exists($this->time_confirm, $list) ? $list[$this->time_confirm] : 'Không xác định';
    }

    public function getPrice()
    {
        $currencyRepo = \App::make('App\Repositories\Currencies\Currency');

        $currency = $currencyRepo->where('display', 'VND')
                                ->where('status', 1)
                                ->first();

        return $this->price * $currency->ratio;
    }

    public function getTranslation($locale = 'vi')
    {
        return $this->hasOne('App\Repositories\ServiceTranslations\ServiceTranslation', 'service_id', 'id')->where('locale', $locale)->first();
    }

    public function comforts()
    {
        return $this->belongsToMany('App\Repositories\Comforts\Comfort', 'comfort_service', 'service_id', 'comfort_id', 'id');
    }

    public function place()
    {
        return $this->belongsTo('App\Repositories\Places\Place', 'place_id');
    }

    public function getUrl()
    {
        return route('web.services.detail', [$this->id, $this->getTranslation()->slug]);
    }

}
