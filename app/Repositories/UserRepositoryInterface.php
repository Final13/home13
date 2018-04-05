<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function all();
    public function paginate();
    public function userFirstLastNameLike(Request $request);
    public function usersWhereNameEmployee();
}