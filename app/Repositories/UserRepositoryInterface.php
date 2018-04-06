<?php

namespace App\Repositories;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function all();
    public function paginate();
    public function getSearchedUsers(Request $request);
    public function getUsersByName();
    public function findUserById(Request $request);
    public function findUserByInputId(UserUpdateRequest $request);
    public function createUser(UserCreateRequest $request);
}