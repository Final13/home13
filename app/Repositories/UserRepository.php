<?php

namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function paginate()
    {
        return User::paginate(5);
    }

    public function userFirstLastNameLike(Request $request)
    {
        return User::where('first_name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('last_name', 'LIKE', '%' . $request->search . '%')->paginate(5);
    }

    public function usersWhereNameEmployee()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'employee');
        })->get();
    }
}