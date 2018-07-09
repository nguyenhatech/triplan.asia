<?php

namespace App\Repositories\Permissions;
use App\Repositories\BaseRepository;

class DbPermissionRepository extends BaseRepository implements PermissionRepository
{
    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

}
