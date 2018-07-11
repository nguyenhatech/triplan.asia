<?php

namespace App\Repositories\Permissions;

use App\Repositories\Entity;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['name', 'display_name', 'description'];

    protected static $logFillable = true;

    protected static $logAttributes = ['id'];

    protected static $logOnlyDirty = true;

    public function getLogNameToUse(string $eventName = '')
    {
       return 'permissions';
    }
}
