<?php

namespace App\Repositories;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
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

    /**
     * @param Request $request
     * @return mixed
     */
    public function getSearchedUsers(Request $request)
    {
        return User::where('first_name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('last_name', 'LIKE', '%' . $request->search . '%')->paginate(5);
    }

    public function getUsersByName()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'employee');
        })->get();
    }

    public function findUserById(Request $request)
    {
        return User::find($request->route('id'));
    }

    public function findUserByInputId(UserUpdateRequest $request)
    {
        return User::find($request->input('id'));
    }

    public function createUser(UserCreateRequest $request)
    {
        return User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'birthday' => $request['birthday'],
            'password' => bcrypt($request['password']),
        ]);
    }
}