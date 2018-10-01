<?php

namespace App\Repositories\Services;

use App\Repositories\Entity;
use Illuminate\Database\Eloquent\Builder;

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

    const EN_TIME_FILTERS = [
        2 => '1 - 2 days',
        5 => '3 - 5 days',
        6 => '5 day more'
    ];

    const PRICE_FILTERS = [
        1   => 'Dưới 1 triệu',
        5   => '1 đến 5 triệu',
        10  => '5 đến 10 triệu',
        11  => 'Trên 10 triệu'
    ];

    protected static function boot()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('status', 1);
        });
        parent::boot();
    }

    public function getImage($type = null)
    {
        if ($type == 'tn') {
            return env('IMAGE_PATH') . 'tiny/' . $this->image;
        } else if ($type == 'sm') {
            return env('IMAGE_PATH') . 'small/' . $this->image;
        } else if ($type == 'md') {
            return env('IMAGE_PATH') . 'medium/' . $this->image;
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
        switch (\App::getLocale()) {
            case 'vi':
                $currency = $currencyRepo->where('display', 'VND')->where('status', 1)->first();
                $price = $this->getPriceByDayOption('daily');
                if (!$price) {
                    return 'Liên hệ';
                }
                return number_format($price,0,",",".") . $currency->unit;
                break;
            case 'en':
                $currency = $currencyRepo->where('display', 'USD')->where('status', 1)->first();
                return $currency->unit . number_format($this->getPriceByDayOption('daily'), 0);
                break;
            default:
                $currency = $currencyRepo->where('display', 'VND')->where('status', 1)->first();
                return number_format($this->getPriceByDayOption('daily'),0,",",".") . $currency->unit;
                break;
        }
    }

    // Hàm lấy giá dịch của dịch vụ theo ngày mình chọn truyền vào
    public function getPriceByDayOption($day = 'TA')
    {
        $currencyRepo = \App::make('App\Repositories\Currencies\Currency');

        $currency = $currencyRepo->where('display', 'VND')
                                ->where('status', 1)
                                ->first();

        // Xem dịch vụ thuộc nhóm nào để bênh giá lên tương ứng:
        $service_group = $this->service_group;

        $config_conversion = 0;

        if ($day === 'daily') {
            $config_conversion = $service_group->daily;
        }
        if ($day === 'weekend') {
            $config_conversion = $service_group->weekend;
        }
        if ($day === 'holiday') {
            $config_conversion = $service_group->holiday;
        }

        return round($this->price * $currency->ratio * (100 + $config_conversion) / 100);
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

    public function service_group()
    {
        return $this->belongsTo('App\Repositories\ServiceGroups\ServiceGroup', 'service_group_id', 'id');
    }

    public function getUrl()
    {
        return route('web.services.detail', ['uuid' => $this->uuid, 'slug' => $this->getTranslation()->slug]);
    }

    public function media_services()
    {
        return $this->hasMany('App\Repositories\MediaServices\MediaService', 'service_id', 'id')
                    ->orderBy('priority', 'asc');
    }

}
