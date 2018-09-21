<?php

namespace App\Repositories\Bookings;

use App\Repositories\Entity;

class Booking extends Entity
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [];

    const BOOKING_NEW       = 1; // Đơn mới
    const BOOKING_CONFIRM   = 2; // Đã xác nhận
    const BOOKING_USING     = 3; // Đang sử dụng
    const BOOKING_COMPLETE  = 4; // Hoàn thành
    const BOOKING_CANCEL    = 5; // Hủy

    // Trường payment_method: Hình thức thanh toán
    const ATM  = 1; // Online trực tuyến
    const VISA = 2; // Paypal
    const CASH = 3; // Tiền mặt

    public function getStatusText()
    {
        $list = [
            self::BOOKING_NEW      => 'Đơn mới',
            self::BOOKING_CONFIRM  => 'Đã xác nhận',
            self::BOOKING_USING    => 'Đang sử dụng',
            self::BOOKING_COMPLETE => 'Hoàn thành',
            self::BOOKING_CANCEL   => 'Hủy'
        ];

        return array_key_exists($this->status, $list) ? $list[$this->status] : 'Không xác định';
    }

    public function getPaymentText()
    {
        $list = [
            self::ATM  => 'Thẻ nội địa',
            self::VISA => 'VISA',
            self::CASH => 'Tiền mặt'
        ];

        return array_key_exists($this->payment_method, $list) ? $list[$this->payment_method] : 'Không xác định';
    }

    public function details()
    {
        return $this->hasMany('App\Repositories\BookingDetails\BookingDetail', 'booking_id', 'id');
    }

}
