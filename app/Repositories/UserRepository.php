<?php

namespace App\Repositories;

use App\Role;
use App\User;

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

    /**
     * @param $search
     * @return mixed
     */
    public function getSearchedUsers($search)
    {
        return User::where('first_name', 'LIKE', '%' . $search . '%')
            ->orWhere('last_name', 'LIKE', '%' . $search . '%')->paginate(5);
    }

    public function getUsersByName()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'employee');
        })->get();
    }

    public function findUserById($id)
    {
        return User::find($id);
    }

    public function createUser($inputs)
    {
        return User::create([
            'first_name' => $inputs['first_name'],
            'last_name' => $inputs['last_name'],
            'email' => $inputs['email'],
            'birthday' => $inputs['birthday'],
            'password' => bcrypt($inputs['password']),
        ]);
    }

    public function updateUser($inputs)
    {
        $user = $this->findUserById($inputs)->first();
        $user->fill($inputs);
        $user->save();

        return $user;
    }

    public function saveUser($inputs)
    {

        $user = $this->createUser($inputs);
        $user
            ->roles()
            ->attach(Role::where('name', 'employee')->first());

        return $user;

    }
}