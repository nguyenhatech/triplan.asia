<?php

namespace App\Repositories\Contacts;

use App\Repositories\Entity;

class Contact extends Entity
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name',
        'email',
        'phone',
        'content',
        'status',
    ];
}
