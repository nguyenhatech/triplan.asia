<?php

namespace App\Repositories\Roles;
use App\Repositories\BaseRepository;

class DbRoleRepository extends BaseRepository implements RoleRepository
{
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

}
