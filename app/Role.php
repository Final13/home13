<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function adminId()
    {
        $adminid = Role::where('name', 'manager')->id;
        return $adminid;
    }
}
