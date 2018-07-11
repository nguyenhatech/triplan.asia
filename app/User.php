<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
    use SoftDeletes;
    use EntrustUserTrait {
        EntrustUserTrait::restore insteadof SoftDeletes;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'phone',
        'avatar',
        'password',
        'address',
        'birthday',
        'sex',
        'system_manager',
        'user_type',
        'user_content',
        'status'
    ];

    protected $dates = ['deleted_at', 'birthday'];

    protected static function boot()
    {
        static::created(function ($model) {
            $model->uuid = \Hashids::encode($model->id);
            $model->save();
        });
        parent::boot();
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $imgPath = 'storage/images/avatars';

    public $uploadPath = 'app/public/images/avatars';

    public $imgWidth = 600; // Chiều dài ảnh to

    public $imgHeight = 600; // Chiều rộng ảnh to

    public $sm_imgWidth = 200; // Chiều dài ảnh nhỏ

    public $sm_imgHeight = 200; // Chiều rộng ảnh nhỏ

    const ENABLE = 1;
    const DISABLE = 0;

    const LIST_STATUS = [
        self::ENABLE => 'Kích hoạt',
        self::DISABLE => 'Chưa kích hoạt'
    ];

    public function setABCAttribute($value)
    {
        $this->attributes['abc'] = $value;
        $this->attributes['slug'] = str_slug($this->attributes['abc']);
    }

    public function getStatusText()
    {
        return array_key_exists($this->status, self::LIST_STATUS) ? self::LIST_STATUS[$this->status] : 'Không xác định';
    }

    public function getCreatedAt()
    {
        return is_null($this->birthday) ? $this->birthday : $this->birthday->format('d-m-Y');
    }

    public function getImage($thumbnail = false)
    {
        $prefix = substr($this->avatar, 0, 5);

        if ($prefix === 'https') {
            return $this->avatar;
        }

        if ($this->avatar == '') return get_asset('web/images/avatars/default-avatar.png');

        $avatar = $thumbnail ? 'sm_' . $this->avatar : $this->avatar;

        return get_asset($this->imgPath . '/' . $avatar);
    }

    public function courses()
    {
        return $this->belongsToMany('App\Repositories\Courses\Course', 'bookings', 'user_id', 'course_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany('App\Repositories\Payments\Payment', 'user_id', 'id');
    }

}
