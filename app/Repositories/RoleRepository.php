<?php

namespace App\Repositories;

use App\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function all()
    {
        return Role::all();
    }

    public function setRoleEmployee()
    {
        return Role::where('name', 'employee')->first();
    }

}