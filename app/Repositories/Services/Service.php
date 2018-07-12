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

    public function getImage()
    {
        if ($this->image) {
            return env('IMAGE_PATH') . $this->image;
        }
        return $this->image;
    }

    public function getTimeConfirmText()
    {
        $list = [
            self::IMMEDIATELY => 'Xác nhận đơn hàng ngay lập tức',
            self::LIMIT_24    => 'Xác nhận đơn hàng trong vòng 24H',
            self::LIMIT_48    => 'Xác nhận đơn hàng trong vòng 48H'
        ];

        return array_key_exists($this->time_confirm, $list) ? $list[$this->time_confirm] : 'Không xác định';
    }

    public function getTranslation($locale = 'vi')
    {
        return $this->hasOne('App\Repositories\ServiceTranslations\ServiceTranslation', 'service_id', 'id')->where('locale', $locale)->first();
    }
}
