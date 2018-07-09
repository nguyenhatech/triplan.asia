<?php

namespace App\Repositories\Roles;

use App\Repositories\Entity;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['name', 'display_name', 'description', 'type'];

    protected static $logFillable = true;

    protected static $logAttributes = ['id'];

    protected static $logOnlyDirty = true;

    public function getLogNameToUse(string $eventName = '')
    {
       return 'roles';
    }
}
