<?php

namespace App\Repositories\SocialAccounts;

use App\Repositories\Entity;

class SocialAccount extends Entity
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'user_id',
        'provider_user_id',
        'provider'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
